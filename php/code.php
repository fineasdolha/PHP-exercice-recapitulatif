<?php
$titles = [
    "The Hitchhiker's Guide to the Galaxy",
    "Alita: Battle Angel",
    "Robocop",
    "Avalon",
    "Tetsuo : the Iron Man",
    "Dead Snow",
    "The Tree of Life",
    "The Dark Crystal",
    "Dredd",
    "Pulp Fiction",
];

$years = [
    2005,
    2019,
    1987,
    2001,
    1989,
    2009,
    2011,
    1982,
    2012,
    1994
];

$genres = [
    "science fiction",
    "science fiction",
    "science fiction",
    "science fiction",
    "Horror",
    "Horror",
    "Drama",
    "Family",
    "Action",
    "Drama"
];

$ratings = [
    "60%",
    "83%",
    "62%",
    "84%",
    "73%",
    "76%",
    "56%",
    "60%",
    "81%",
    "72%"

];

$stars;

function makeStars($ratings)
{
    $starstmp = $ratings;
    for ($i = 0; $i <= count($ratings) - 1; $i++) {   //iterate through each element of ratings array
        switch ($ratings[$i]) {          //test each value to establish the number of starstmp
            case floatval($ratings[$i]) / 100.00 <= 0.10:  //use the function floatval to extract the decimal point of percentage
                $starstmp[$i] = '0.5 star';                 //and compare the result to get number of starstmp      
                break;                                   //enregister this result in the new starstmp[] array   
            case floatval($ratings[$i]) / 100.00 <= 0.20:
                $starstmp[$i] = '1 star';
                break;
            case floatval($ratings[$i]) / 100.00 <= 0.30:
                $starstmp[$i] = '1.5 stars';
                break;
            case floatval($ratings[$i]) / 100.00 <= 0.40:
                $starstmp[$i] = '2 stars';
                break;
            case floatval($ratings[$i]) / 100.00 <= 0.50:
                $starstmp[$i] = '2.5 stars';
                break;
            case floatval($ratings[$i]) / 100.00 <= 0.60:
                $starstmp[$i] = '3 stars';
                break;
            case floatval($ratings[$i]) / 100.00 <= 0.70:
                $starstmp[$i] = '3.5 stars';
                break;
            case floatval($ratings[$i]) / 100.00 <= 0.80:
                $starstmp[$i] = '4 stars';
                break;
            case floatval($ratings[$i]) / 100.00 <= 0.90:
                $starstmp[$i] = '4.5 stars';
                break;
            case floatval($ratings[$i]) / 100.00 <= 1:
                $starstmp[$i] = '5 stars';
                break;
            default:
                echo ("no stars");   //default case if the user introduces somehing else than a percentage
                break;
        }
    }
    return ($starstmp);
};

$stars = makeStars($ratings);

for ($i = 0; $i < 10; $i++) {
    $movies[$i]  = array(
        'titles' => $titles[$i],
        'years' => $years[$i],
        'genres' => $genres[$i],
        'ratings' => $stars[$i]

    );
}

function movieSort($movies, $on, $order = SORT_ASC)
{
    $newArray = array();
    $sortableArray = array();  //create a new temporary array with the values that need to be sorted
    if (count($movies) > 0) {
        foreach ($movies as $i => $value) {  //iterate through the values of the original array
            if (is_array($value)) {     //test each value to see if its array (our case; always yes)
                foreach ($value as $j => $value2) {  // iterate through each value of the secondary array in search of the good parameter
                    if ($j === $on) {           // once found the expected parameter
                        $sortableArray[$i] = $value2;   //create the array that needs to be sorted
                    }
                }
            } else {
                $sortableArray[$i] = $value; //take the value in case it is not an array
            }
        }
    }
    switch ($order) {
        case SORT_ASC:  
            asort($sortableArray);
            break;
        case SORT_DESC:
            arsort($sortableArray);
            break;
    }
 
    foreach ($sortableArray as $key => $value) {
         $newArray[$key] = $movies[$key];
    }

    return ($newArray);
}

print_r(movieSort($movies, 'years', $order = SORT_ASC));
