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







create function makeStars ($ratings)  //change from percentage to stars
    create temporary array $starstmp []
    for i going from 0 to lengthof $ratings
        switch on $ratings[$i]
            case decimalvalue of $ratings$i <= 0.10
                $starstmp[$i] takes '0.5 star'
                break
            case decimalvalue of $ratings$i <= 0.20
                $starstmp[$i] takes '1 star'
                break
            case decimalvalue of $ratings$i <= 0.30
                $starstmp[$i] takes '1.5 stars'
                break
            case decimalvalue of $ratings$i <= 0.40
                $starstmp[$i] takes '2 stars'
                break
            case decimalvalue of $ratings$i <= 0.50
                $starstmp[$i] takes '2.5 stars'
                break
            case decimalvalue of $ratings$i <= 0.60
                $starstmp[$i] takes '3 stars'
                break    
            case decimalvalue of $ratings$i <= 0.70
                $starstmp[$i] takes '3.5 stars'
                break
            case decimalvalue of $ratings$i <= 0.80
                $starstmp[$i] takes '4 stars'
                break
            case decimalvalue of $ratings$i <= 0.90
                $starstmp[$i] takes '4.5 stars'
                break        
            case decimalvalue of $ratings$i <= 1
                $starstmp[$i] takes '5 stars'
                break
            default case 'no stars'
            end switch
        end for    
    return $starstmp
end function





   create function movieSort ($movies, $on, $order=SORT_ASC){
    $newArray = array();
    $sortableArray = array();

    if (count($movies)>0)
        foreach ($movies as $i => $value)
            if ($value) is array
                foreach ($value as $j => $value2)
                    if($j === $on)
                        sortableArray[$i] takes $value2
                    endif
                endforeach
            endif else sortableArray [$i] = $value                    
        endforeach
    endif

    switch on $order

        case order == SORT_ASC:
            for (i=1; i <= count($sortableArray)-1;i++)
            asort ($sortableArray);
        case order == SORT_DESC;
            arsort ($sortableArray);
    end switch

    foreach ($sortableArray as $i => $value)
        $newArray[$i] = $movies[$i]             
    endforeach
    return newArray
   }end function

$stars takes makeStars($ratings)

for $i going from 0 to lengthof titles 
    $movies[$i] takes array (
        'titles' => $titles[$i]
        'years' => $years[$i]
        'genres' => $genres[$i]
        'ratings' => $stars[$i]  
    )

print (function movieSort($movies, 'years', $order))






 






