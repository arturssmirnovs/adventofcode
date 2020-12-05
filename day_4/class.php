<?php
class DayFourPartOne {
    /**
     * @var String File location
     */
    public $file;

    /**
     * @var String Found target
     */
    private $_output;

    /**
     * DayOne constructor.
     * @param $file String File location
     */
    public function __construct($file) {
        $this->file = $file;
    }

    public function output() {
        $data = file_get_contents($this->file);
        $data = preg_split("#\n\s*\n#Uis", $data);

        $i = 0;
        foreach ($data as $passport) {
            if ($this->validatePassport($passport)) {
               $i++;
            }
        }

        return $i;
    }

    /**
     * @param $passport
    byr (Birth Year)
    iyr (Issue Year)
    eyr (Expiration Year)
    hgt (Height)
    hcl (Hair Color)
    ecl (Eye Color)
    pid (Passport ID)
    cid (Country ID)
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

        return true;
    }
}