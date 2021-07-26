<?php
/**
 * Class describes xml functionality.
 * 
 * @since      1.0.0
 * @package    swiss-timing
 * @author     sinch.pro <admin@sinch.pro>
 */
class XML_Swiss_Timing {

    /**
     * Plugin root directory
     * 
     * @var      string
     * @access   private
     */
    private $root_dir;

    /**
     * Constructor
     * 
     * @since      1.0.0
     * @return     void
     */
    public function __construct() {

        $this->root_dir = SWISS_ROOT;

        add_shortcode( 'get_xml', array( $this, 'get_xml') );
    }

    /**
     * Retrieve xml data
     * 
     * @since      1.0.0
     * @return     string       $xml        Xml data.
     */
    public function get_xml() {

        $filename = $this->root_dir . 'assets/xml/athletes.xml';

        if (file_exists($filename)) {
            $xml = simplexml_load_file($filename);

            $xml_results = $xml->Competition->Result;

            require_once $this->root_dir . 'template-parts/xml-info-section.php';

            $sportsDescription = $xml->Competition->ExtendedInfos->SportDescription->attributes();
            // echo "<pre>";
            // print_r( $sportsDescription );
            // echo "</pre>";
            ?>
            <section class="discipline-desc">
                <h2>Discipline desc</h2>
                <div class="discipline-desc__container">
            <?php
            foreach( $sportsDescription as $key => $value ) {
                ?>
                    <div class="discipline-desc__item">
                        <div class="discipline-desc__item-title">
                            <?php echo $key; ?>
                        </div>
                        <div class="discipline-desc__item-value">
                            <?php echo $value; ?>
                        </div>
                    </div>
                <?php
            }
            ?>
                </div>
            </section>
            <h2 class="athletes-data">Athletes data</h2>   
            <?php
            require_once plugin_dir_path( __FILE__ ) . 'partials/xml/xml-single-result.php';



        } else {
            exit('Failed to open test.xml.');
        }

    }
}