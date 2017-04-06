<?php

    $amounts = array(
                    array(
                            95,
                            2
                        ),
                    array(
                            96,
                            5
                        )
            );

    $invoices = array(1 =>"", 2 => 490, 3 => "", 4 => "", 5 => 1500);

    foreach($amounts as $innerArray) {

        if(!empty($invoices[$innerArray[1]])) {
            $invoices[$innerArray[0]] = $invoices[$innerArray[1]];
            unset($invoices[$innerArray[1]]);
        }
    }

    print_r($invoices);

?>