<?php

namespace App\Libraries;

class Mob
{
    public $account;
    public $account_primary;
    public $data;

    public function read($path)
    {
        if (file_exists($path)) {
            $acc = file_get_contents($path);
            $this->data = strtoupper(trim(bin2hex($acc)));
            $this->account_primary = [
                'account' => trim(substr($acc, 0, 16)),
                'password' => trim(substr($acc, 16, 16)),
                'numeric' => trim(substr($acc, 188, 6))
            ];
            return true;
        }
        return false;
    }

    public function account_char_all()
    {
        for ($i = 0; $i < 4; $i++) {
            $char[$i] = $this->account_char($i);
        }
        return array_filter($char);
    }

    public function account_char($number)
    {
        if ($number === 'mob') {
            return $this->read_mob($this->data);
        } else {
            return $this->read_mob(substr($this->data, 416 + (1512 * $number), 1512));
        }
    }

    protected function read_mob($data)
    {
        if (strlen($data) != 1512) {
            return false;
        }
        $name = hex2bin(explode('00', substr($data, 0, 24))[0]);
        if ($name == "") {
            return false;
        }
        //echo $name.$data;
        $attr = array(
            "name"     => $name,
            "race"     => $this->hex2num(substr($data, 32, 2)),
            "merchant" => $this->hex2num(substr($data, 34, 2)),
            "guildid"  => $this->hex2num(substr($data, 36, 4)),
            "class"    => $this->hex2num(substr($data, 40, 2)),

            "gold"     => $this->hex2num(substr($data, 48, 8)),
            "exp"      => $this->hex2num(substr($data, 56, 8)),
            "cordx"    => $this->hex2num(substr($data, 64, 4)),
            "cordy"    => $this->hex2num(substr($data, 68, 4)),
            "level"    => $this->hex2num(substr($data, 72, 4)) + 1,

            "defence"  => $this->hex2num(substr($data, 76, 4)),
            "atack"    => $this->hex2num(substr($data, 80, 4)),

            "str"      => $this->hex2num(substr($data, 104, 4)),
            "int"      => $this->hex2num(substr($data, 108, 4)),
            "dex"      => $this->hex2num(substr($data, 112, 4)),
            "con"      => $this->hex2num(substr($data, 116, 4)),

            "skill"    => array(
                $this->hex2num(substr($data, 120, 2)),
                $this->hex2num(substr($data, 122, 2)),
                $this->hex2num(substr($data, 124, 2)),
                $this->hex2num(substr($data, 126, 2))
            ),

            "hp_max" => $this->hex2num(substr($data, 144, 4)),
            "hp_now" => $this->hex2num(substr($data, 148, 4)),
            "mp_max" => $this->hex2num(substr($data, 152, 4)),
            "mp_now" => $this->hex2num(substr($data, 156, 4)),

            "face"   => $this->get_item(substr($data, 184, 16)),
            "helmet" => $this->get_item(substr($data, 200, 16)),
            "chest"  => $this->get_item(substr($data, 216, 16)),
            "legs"   => $this->get_item(substr($data, 232, 16)),
            "gloves" => $this->get_item(substr($data, 248, 16)),
            "boots"  => $this->get_item(substr($data, 264, 16)),
            "hand1"  => $this->get_item(substr($data, 280, 16)),
            "hand2"  => $this->get_item(substr($data, 296, 16)),
            "ring"   => $this->get_item(substr($data, 312, 16)),
            "neck"   => $this->get_item(substr($data, 328, 16)),
            "jewel"  => $this->get_item(substr($data, 344, 16)),
            "medal"  => $this->get_item(substr($data, 360, 16)),
            "guild"  => $this->get_item(substr($data, 376, 16)),
            "fairy"  => $this->get_item(substr($data, 392, 16)),
            "mount"  => $this->get_item(substr($data, 408, 16)),
            "cape"   => $this->get_item(substr($data, 424, 16)),

            "frag_now" => $this->hex2num(substr($data, 1454, 2)),
            "frag_max" => $this->hex2num(substr($data, 1458, 2)),

            "pt_attr"  => $this->hex2num(substr($data, 1472, 4)),
            "pt_espec" => $this->hex2num(substr($data, 1476, 4)),
            "pt_skill" => $this->hex2num(substr($data, 1480, 4)),

            "hp_regen" => $this->hex2num(substr($data, 1500, 2)),
            "mp_regen" => $this->hex2num(substr($data, 1502, 2)),

            "res1"     => $this->hex2num(substr($data, 1504, 2)),
            "res2"     => $this->hex2num(substr($data, 1506, 2)),
            "res3"     => $this->hex2num(substr($data, 1508, 2)),
            "res4"     => $this->hex2num(substr($data, 1510, 2))
        );
        for ($i = 0; $i < 64; $i++) {
            $item = $this->get_item(substr($data, 440 + (16 * $i), 16));
            if (!$item) {
                continue;
            }
            $box[$i] = $item;
        }

        return $char_ready = array("attr" => $attr);
    }

    protected function get_item($data)
    {
        $item = substr($data, 0, 4);
        if ($item == "0000") {
            return null;
        }
        return array(
            "item" => $this->hex2num($item),
            "att1" => $this->hex2num(substr($data, 4, 2)),
            "val1" => $this->hex2num(substr($data, 6, 2)),
            "att2" => $this->hex2num(substr($data, 8, 2)),
            "val2" => $this->hex2num(substr($data, 10, 2)),
            "att3" => $this->hex2num(substr($data, 12, 2)),
            "val3" => $this->hex2num(substr($data, 14, 2)),
        );
    }

    protected function consistence()
    {
        if (strlen($this->data) == 4292) {
            return true;
        } else {
            return false;
        }
    }

    public function invhex($data)
    {
        $t = strlen($data);
        if ($t % 2) {
            $data = "0" . $data;
        }
        $d = "";
        for ($i = 0; $i <= $t; $i += 2) {
            $d .= substr($data, ($t - $i), 2);
        }
        return $d;
    }

    public function hex2num($data)
    {
        return hexdec($this->invhex($data));
    }

    public function num2hex($data)
    {
        return $this->invhex(dechex($data));
    }
}
