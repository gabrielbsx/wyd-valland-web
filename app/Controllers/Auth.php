<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\News;
use App\Models\Configuration;
use App\Models\Tickets;
use App\Models\TicketAnswers;
use App\Libraries\Mob;
use App\Models\MercadopagoRequests;
use App\Models\MercadopagoPincode;
use MercadoPago;

class Auth extends BaseController
{
    public function login()
    {
        if (!session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $username = $this->request->getPost('username');
                    $password = $this->request->getPost('password');
                    $acc = $this->ingame . $this->dbsrv . 'account/' . $this->initial($username) . '/' . $username;
                    if (file_exists($acc)) {
                        $user = new Users();
                        $account = $user->where('username', $username)->first();
                        if ($account) {
                            if (password_verify($password, $account['password'])) {
                                session()->set('login', $account);
                                $this->data['success'] = 'Login efetuado com sucesso!';
                                return redirect()->to(base_url('dashboard'))->with($this->rettype, $this->data);
                            } else $this->data['error'] = 'Não foi possível efetuar o login!!';
                        } else $this->data['error'] = 'Conta inexistente!';
                    } else $this->data['error'] = 'Conta inexistente!';
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
        } else $this->data['error'] = 'Não foi possível efetuar o login!';
        return redirect()->to(base_url('site/login'))->with($this->rettype, $this->data);
    }

    public function register()
    {
        if (!session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $user = new Users();
                    if ($user->save($this->request->getPost())) {
                        $username = $this->request->getPost('username');
                        $password = $this->request->getPost('password');
                        $acc = $this->ingame . $this->dbsrv . 'account/' . $this->initial($username) . '/' . $username;
                        if (!file_exists($acc)) {
                            $fpb = fopen($this->accbase, 'rb');
                            $base = fread($fpb, filesize($this->accbase));
                            $userid = substr($base, 0, strlen($username));
                            $passid = substr($base, 16, strlen($password));
                            $base = str_replace($userid, $username, $base);
                            $base = str_replace($passid, $password, $base);
                            $fp = fopen($acc, 'w');
                            $ret = fwrite($fp, $base);
                            fclose($fpb);
                            fclose($fp);
                            if ($ret) {
                                $this->data['success'] = 'Conta criada com sucesso!';
                            } else {
                                $user->where('username', $username)->delete();
                                $this->data['error'] = 'Não foi possível inserir a conta ao game!';
                            }
                        } else $this->data['error'] = 'Usuário existente!';
                    } else $this->data['error'] = implode("<div class=\"grid mt-5\"></div>", $user->errors());
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
        } else $this->data['error'] = 'Não foi possível efetuar o cadastro!';
        return redirect()->to(base_url('site/register'))->with($this->rettype, $this->data);
    }

    public function alterpass()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $validation = \Config\Services::validation();
                    $validation->setRules([
                        'oldpassword'       => 'required|alpha_numeric|min_length[4]|max_length[10]',
                        'password'          => 'required|alpha_numeric|min_length[4]|max_length[10]',
                        'password_confirm'  => 'required_with[password]|matches[password]'
                    ]);
                    if ($validation->run($this->request->getPost())) {
                        if (password_verify($this->request->getPost('oldpassword'), session()->get('login')['password'])) {
                            $username = session()->get('login')['username'];
                            $acc = $this->ingame . $this->dbsrv . 'account/' . $this->initial($username) . '/' . $username;
                            $fp = fopen($acc, 'rb');
                            $account = fread($fp, filesize($acc));
                            $password = $this->request->getPost('password');
                            for ($i = 0; $i < strlen($password); $i++)
                                $account[(16 + $i)] = $password[$i];
                            $account[(16 + strlen($password))] = hex2bin('00');
                            fclose($fp);
                            $fp = fopen($acc, 'w');
                            $ret = fwrite($fp, $account);
                            fclose($fp);
                            if ($ret) {
                                $user = new Users();
                                if ($user->whereIn('username', [session()->get('login')['username']])->set(['password' => $password])->update()) {
                                    $this->data['success'] = 'Senha alterada com sucesso!';
                                    $account = $user->where('username', session()->get('login')['username'])->first();
                                    session()->set('login', $account);
                                } else $this->data['error'] = 'Não foi possível alterar a senha!';
                            } else $this->data['error'] = 'Não foi possível alterar a senha!';
                        } else $this->data['error'] = 'Senha atual inválida!';
                    } else $this->data['error'] = implode("<div class=\"grid mt-5\"></div>", ['Os campos preenchidos estão inválidos!', 'As senhas devem conter de 4 a 10 caracteres alfa numéricos!']);
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
            return redirect()->to(base_url('dashboard/alterpass'))->with($this->rettype, $this->data);
        }
        $this->data['error'] = 'Efetue o login para acessar a alteração de senha!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function numericpass()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $username = session()->get('login')['username'];
                    $path = $this->ingame . $this->dbsrv . 'account/' . $this->initial($username) . '/' . $username;
                    $mob = new Mob();
                    $mob->read($path);
                    $read = $mob->account_primary;
                    $user = $read['account'];
                    $pass = explode(hex2bin('00'), $read['password'])[0];
                    $numeric = strlen($read['numeric']) ? $read['numeric'] : 'Senha numérica não definida!';
                    $text = "Usuário: $user\nSenha: $pass\nNumérica: $numeric\n________________________________\n";
                    $sender = \Config\Services::email();
                    $sender->setFrom('teste@gmail.com', 'Teste');
                    $sender->setTo(session()->get('login')['email']);
                    $sender->setSubject('Recuperação de conta - Tail of Dark');
                    $sender->setMessage($text);
                    if ($sender->send()) {
                        $this->data['success'] = 'Recuperação da numérica enviado ao email vinculado a conta!';
                    } else $this->data['error'] = 'Não foi possível enviar o email!';
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
            return redirect()->to(base_url('dashboard/numericpass'))->with($this->rettype, $this->data);
        }
        $this->data['error'] = 'Você precisa estar logado para recuperar a senha numérica!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function recovery()
    {
        if (!session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $validation = \Config\Services::validation();
                    $validation->setRules([
                        'email' => 'required|min_length[10]|max_length[100]|valid_email',
                    ]);
                    if ($validation->run($this->request->getPost())) {
                        $email = $this->request->getPost('email');
                        $user = new Users();
                        $accounts = $user->where(['email' => $email])->get()->getResultArray();
                        $text = null;
                        if (count($accounts) > 0) {
                            foreach ($accounts as $key => $value) {
                                $username = $value['username'];
                                $acc = $this->ingame . $this->dbsrv . 'account/' . $this->initial($username) . '/' . $username;
                                $mob = new Mob();
                                $mob->read($acc);
                                $read = $mob->account_primary;
                                $user = $read['account'];
                                $pass = explode(hex2bin('00'), $read['password'])[0];
                                $numeric = strlen($read['numeric']) ? $read['numeric'] : 'Senha numérica não definida!';
                                $text .= "Usuário: $user\nSenha: $pass\nNumérica: $numeric\n________________________________\n";
                            }
                            $sender = \Config\Services::email();
                            $sender->setFrom('teste@gmail.com', 'Teste');
                            $sender->setTo($email);
                            $sender->setSubject('Recuperação de conta - Tail of Dark');
                            $sender->setMessage($text);
                            if ($sender->send()) {
                                $this->data['success'] = 'Email com a(s) conta(s) enviado com sucesso!';
                            } else $this->data['error'] = 'Não foi possível enviar a(s) conta(s) ao email!';
                        } else $this->data['erorr'] = 'Não há conta cadastrada no email informado!';
                    } else $this->data['error'] = 'Email inválido!';
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
            return redirect()->to(base_url('site/recovery'))->with($this->rettype, $this->data);
        } else $this->data['error'] = 'Você não pode estar logado para recuperar uma conta!';
        return redirect()->to(base_url('dashboard'))->with($this->rettype, $this->data);
    }

    public function guildmark()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) === 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $guildid = $this->request->getPost('guildid');
                    $guildmark = $this->request->getFile('guildmark');
                    if ($guildmark->getClientMimeType() == 'image/bmp' && $guildmark->getClientExtension() == 'bmp') {
                        if ($guildmark->getSize() < 1024 && $guildmark->getSize() > 0) {
                            $mob = json_decode($this->mob(), true);
                            if (count($mob) > 0) {
                                foreach ($mob as $key => $value) {
                                    if ($guildid == $value['guildid']) {
                                        if ($guildmark->isValid() && !$guildmark->hasMoved()) {
                                            $name = 'b0' . (1000000 + $guildid) . '.bmp';
                                            if ($guildmark->move('../public/img_guilds/', $name)) {
                                                $this->data['success'] = 'Guildmark enviada com sucesso!';
                                                return redirect()->to(base_url('dashboard/guildmark'))->with($this->rettype, $this->data);
                                            } else $this->data['error'] = 'Não foi possível enviar a guildmark!';
                                        } else $this->data['error'] = 'Guildmark inválida!';
                                    }
                                }
                                $this->data['error'] = 'Você não é líder da guild id informada!';
                            } else $this->data['error'] = 'Você não é líder de guild!';
                        } else $this->data['error'] = 'Tamanho não deve ultrapassar 1024kb!';
                    } else $this->data['error'] = 'Apenas imagem do tipo BMP!';
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
            return redirect()->to(base_url('dashboard/guildmark'))->with($this->rettype, $this->data);
        }
        $this->data['error'] = 'Você precisa estar logado para enviar guildmark!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function mob()
    {
        if (session()->has('login')) {
            $username = session()->get('login')['username'];
            $path = $this->ingame . $this->dbsrv . 'account/' . $this->initial($username) . '/' . $username;
            $mob = new Mob();
            $mob->read($path);
            $account = $mob->account_char_all();
            $guildinfo = [];
            $id = 0;
            foreach ($account as $key => $value) {
                $guildid = $value['attr']['guildid'];
                $path = $this->ingame . $this->dbsrv . 'guild/' . $guildid . '.bin';
                if (file_exists($path)) {
                    $guild = file_get_contents($path);
                    $guildname = trim(substr($guild, 4, 10));
                    $medal = $value['attr']['guild']['item'];
                    if ($medal == 509) {
                        $guildinfo[$id]['guildname'] = $guildname;
                        $guildinfo[$id]['guildid'] = $guildid;
                        $id++;
                    }
                }
            }
            return json_encode($guildinfo);
        }
        $this->data['error'] = 'Você precisa estar logado para verificar as guilds pertencente a conta!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function createnews()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $news = new News();
                        $data = $this->request->getPost();
                        $data['id_user'] = session()->get('login')['id'];
                        if ($news->save($data)) {
                            $this->data['success'] = 'Notícia cadastrada com sucesso!';
                        } else $this->data['error'] = implode("<div class=\"grid mt-5\"></div>", $news->errors());
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('dashboard/createnews'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function editnews()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                $ret = 'news';
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $news = new News();
                        $id = $this->request->getPost('id');
                        if ($id > 0) {
                            $ret = 'editnews/' . $id;
                            $data = $this->request->getPost();
                            $data['id_user'] = session()->get('login')['id'];
                            if ($news->update($id, $data)) {
                                $this->data['success'] = 'Notícia editada com sucesso!';
                            } else $this->data['error'] = implode("<div class=\"grid mt-5\"></div>", $news->errors());
                        } else $this->data['error'] = 'Notícia inválida';
                    } else $this->data['error'] = 'Recaptcha inválido';
                } else $this->data['error'] = 'Requisição inválida';
                return redirect()->to(base_url('dashboard/' . $ret))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function delnews($id = null)
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    if ($id > 0) {
                        $news = new News();
                        if ($news->where('id', $id)->delete()) {
                            $this->data['success'] = 'Notícia deletada com sucesso!';
                        } else $this->data['error'] = 'Não foi possível deletar a notícia!';
                    } else $this->data['error'] = 'Notícia inválida!';
                } else $this->data['error'] = 'Recaptcha inválido!';
                return redirect()->to(base_url('dashboard/news'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function answerticket()
    {
        if (session()->has('login')) {
            $ret = 'tickets';
            if ($this->request->getMethod(true) == 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $ticket = new Tickets();
                    $answer = new TicketAnswers();
                    $data = $this->request->getPost();
                    $data['id_user'] = session()->get('login')['id'];
                    $iduser = session()->get('login')['id'];
                    $access = session()->get('login')['access'];
                    $id = $this->request->getPost('id_ticket');
                    $ret = 'answerticket/' . $this->request->getPost('id_ticket');
                    if ($access == 3)
                        $check = $ticket->where(['id' => $id])->first();
                    else
                        $check = $ticket->where(['id_user' => $iduser, 'id' => $id])->first();
                    if ($check) {
                        if ($check['status'] == 0) {
                            if ($answer->save($data)) {
                                $this->data['success'] = 'Ticket respondido com sucesso!';
                            } else $this->data['error'] = implode("<div class=\"grid mt-5\"></div>", $answer->errors());
                        } else $this->data['error'] = 'Ticket encerrado!';
                    } else $this->data['error'] = 'Você não pode responder o ticket!';
                } else $this->data['error'] = 'Recaptcha inválido!';
                return redirect()->to(base_url('dashboard/' . $ret))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function closeticket()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) == 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $ticket = new Tickets();
                    $iduser = session()->get('login')['id'];
                    $access = session()->get('login')['access'];
                    $id = $this->request->getPost('id_ticket');
                    if ($access == 3)
                        $check = $ticket->where(['id' => $id])->first();
                    else
                        $check = $ticket->where(['id_user' => $iduser, 'id' => $id])->first();
                    if ($check) {
                        if ($check['status'] == 0) {
                            if ($ticket->update($id, ['status' => 1])) {
                                $this->data['success'] = 'Ticket encerrado com sucesso!';
                            } else $this->data['error'] = implode("<div class=\"grid mt-5\"></div>", $ticket->errors());
                        } else $this->data['error'] = 'Ticket encerrado!';
                    } else $this->data['error'] = 'Você não pode encerrar o ticket!';
                    return redirect()->to(base_url('dashboard/answerticket/' . $id))->with($this->rettype, $this->data);
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function createticket()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) == 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $ticket = new Tickets();
                    $data = $this->request->getPost();
                    $data['id_user'] = session()->get('login')['id'];
                    $data['status'] = 0;
                    if ($ticket->save($data)) {
                        $this->data['success'] = 'Notícia cadastrada com sucesso!';
                    } else $this->data['error'] = implode("<div class=\"grid mt-5\"></div>", $ticket->errors());
                    return redirect()->to(base_url('dashboard/createticket'))->with($this->rettype, $this->data);
                } else $this->data['error'] = 'Recaptcha inválido!';
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function mercadopago()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) == 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                    $mercadopago = new MercadopagoRequests();
                    $amount = intval($this->request->getPost('value'));
                    $mp = (new Configuration())->select(['mercadopago_key', 'mercadopago_token', 'title'])->first();
                    #MercadoPago\SDK::setClientId($mp['mercadopago_key']);
                    #MercadoPago\SDK::setClientSecret($mp['mercadopago_token']);
                    #MercadoPago\SDK::setPublicKey($mp['mercadopago_key']);
                    MercadoPago\SDK::setAccessToken($mp['mercadopago_token']);
                    $preference = new MercadoPago\Preference();
                    $item = new MercadoPago\Item();
                    srand(5);
                    $id = (string) (time() . rand());
                    $item->id = $id;
                    $item->title = $mp['title'] . ' - ' . $amount . ' donate';
                    $item->quantity = 1;
                    $item->unit_price = (int) $amount;
                    $preference->items = array($item);
                    $preference->external_reference = $id;
                    $preference->notification_url = base_url('/donate/mercadopago');
                    $preference->back_urls = [
                        'success' => base_url('dashboard/mercadopago?back=success'),
                        'pending' => base_url('dashboard/mercadopago?back=pending'),
                        'failure' => base_url('dashboard/mercadopago?back=failure'),
                    ];
                    $preference->save();
                    $row = [
                        'referenceId' => $id,
                        'referenceIdBox' => $preference->id,
                        'value' => $amount,
                        'status' => 0,
                        'id_user' => session()->get('login')['id'],
                        'url_payment' => $preference->init_point,
                    ];
                    if ($mercadopago->save($row)) {
                        $this->data['paymentUrl'] = $preference->init_point;
                        $this->data['success'] = 'Fatura gerada com sucesso!';
                    } else $this->data['error'] = 'Não foi possível gerar uma fatura!';
                } else $this->data['error'] = 'Recaptcha inválido!';
            } else $this->data['error'] = 'Requisição inválida!';
            return redirect()->to(base_url('dashboard/mercadopago'))->with($this->rettype, $this->data);
        } else $this->data['error'] = 'Você precisa estar logado para doar!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function picpay()
    {
        if (session()->has('login')) {
            if ($this->request->getMethod(true) == 'POST') {
                if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                } else $this->data['error'] = 'Recaptcha inválido!';
            }
            return redirect()->to(base_url('dashboard/picpay'))->with($this->rettype, $this->data);
        } else $this->data['error'] = 'Você precisa estar logado para doar!';
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }

    public function config()
    {
        if (session()->has('login')) {
            if (session()->get('login')['access'] == 3) {
                if ($this->request->getMethod(true) == 'POST') {
                    if (recaptcha($this->request->getPost('g-recaptcha-response'), $this->data['recaptcha_secret'])) {
                        $config = new Configuration();
                        $data = $config->first();
                        if ($data) {
                            if ($config->update($data['id'], array_filter($this->request->getPost()))) {
                                $this->data['success'] = 'Site configurado com sucesso!';
                            } else $this->data['error'] = 'Não foi possível configurar o site!';
                        } else {
                            if ($config->save($this->request->getPost()))
                                $this->data['success'] = 'Site configurado com sucesso!';
                            else
                                $this->data['error'] = implode("<div class=\"grid mt-5\"></div>", $config->errors());
                        }
                    } else $this->data['error'] = 'Recaptcha inválido!';
                } else $this->data['error'] = 'Requisição inválida!';
                return redirect()->to(base_url('dashboard/config'))->with($this->rettype, $this->data);
            }
        }
        return redirect()->to(base_url('site'))->with($this->rettype, $this->data);
    }
}
