<?php

foreach( $xml_results as $result ) {
    $athlete_atts = $result->Competitor->Composition->Athlete->Description->attributes();
    $athleteRaceDetails = $result->Competitor->Composition->Athlete->EventUnitEntry->attributes();
    ?>
        <article class="athlete-xml">
            
        <?php
            foreach( $athlete_atts as $key => $value ) {

                require $this->root_dir . 'template-parts/xml-athlete-data.php';

            }

            foreach( $athleteRaceDetails as $key => $value ) {

                require $this->root_dir . 'template-parts/xml-athlete-data.php';

            }
        ?>
        </article>
    <?php
}