<?php

function biodata($names, $address, $hobbies, $is_maried, $school, $skill)
{
    $data["name"] = $names;
    $data["address"] = $address;
    $data["hobbies"] = $hobbies;
    $data["is_maried"] = $is_maried;
    $data["school"] = $school;
    $data["skill"] = $skill;
    return json_encode($data);
}
$names = "Ichsan";
$address = "Bogor";
$hobbies = ["main game", "bulu tangkis", "traveling"];
$is_maried = false;
$school = new stdClass();
$school->highschool = "SMK INFORMATIKA PESAT";
$school->university = "20";

// $skill = array(
//     '1' => 'PHP',
//     '2' => 'CSS',
//     '3' => 'HTML'
// );

$skill = new stdClass();
$skill->name = "PHP";
$skill->score = "80";
$skills = new ArrayObject($skill);

echo biodata($names, $address, $hobbies, $is_maried, $school, $skills);
