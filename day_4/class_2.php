<?php
class DayFourPartTwo extends DayFourPartOne {
    /**
     * DayFourPartTwo constructor.
     * @param $file
     */
    public function __construct($file)
    {
        parent::__construct($file);
    }

    /**
     * Extanded validation
     * @param $passport
     * @return bool
     */
    public function validatePassport($passport) {
        $fields = [];

        $passport = str_replace(PHP_EOL, " ", $passport);

        $parts = explode(" ", $passport);

        foreach ($parts as $part) {
            $values = explode(":", $part);
            $fields[$values[0]] = $values[1];
        }

        if (!isset($fields["byr"]) || !isset($fields["iyr"]) || !isset($fields["eyr"]) || !isset($fields["hgt"]) || !isset($fields["hcl"]) || !isset($fields["ecl"]) || !isset($fields["pid"])) {
            return false;
        }

        //byr (Birth Year) - four digits; at least 1920 and at most 2002.
        if (!in_array($fields["byr"], range(1920, 2002))) {
            return false;
        }

        //iyr (Issue Year) - four digits; at least 2010 and at most 2020.
        if (!in_array($fields["iyr"], range(2010, 2020))) {
            return false;
        }

        //eyr (Expiration Year) - four digits; at least 2020 and at most 2030.
        if (!in_array($fields["eyr"], range(2020, 2030))) {
            return false;
        }

        //hgt (Height) - a number followed by either cm or in:
        $value = substr($fields["hgt"], -2, 2);
        if (!in_array($value, ["cm", "in"])) {
            return false;
        }
        //If cm, the number must be at least 150 and at most 193.
        if ($value == "cm") {
            if (!in_array(str_replace($value, "", $fields["hgt"]), range(150, 193))) {
                return false;
            }
        }
        //If in, the number must be at least 59 and at most 76.
        if ($value == "in") {
            if (!in_array(str_replace($value, "", $fields["hgt"]), range(59, 76))) {
                return false;
            }
        }

        //hcl (Hair Color) - a # followed by exactly six characters 0-9 or a-f.
        preg_match_all("/#[a-z-0-9]{6}/", $fields["hcl"], $metches);
        if (!count($metches)) {
            return false;
        }
        if (!$metches[0][0]) {
            return false;
        }

        //ecl (Eye Color) - exactly one of: amb blu brn gry grn hzl oth.
        if (!in_array($fields["ecl"], ["amb", "blu", "brn", "gry", "grn",  "hzl", "oth"])) {
            return false;
        }

        //pid (Passport ID) - a nine-digit number, including leading zeroes.
        if (!is_numeric($fields["pid"])) {
            return false;
        }
        if (strlen($fields["pid"]) !== 9) {
            return false;
        }

        return true;
    }
}