<?php
/*
 * Copyright 2005-2016 OCSInventory-NG/OCSInventory-ocsreports contributors.
 * See the Contributors file for more details about them.
 *
 * This file is part of OCSInventory-NG/OCSInventory-ocsreports.
 *
 * OCSInventory-NG/OCSInventory-ocsreports is free software: you can redistribute
 * it and/or modify it under the terms of the GNU General Public License as
 * published by the Free Software Foundation, either version 2 of the License,
 * or (at your option) any later version.
 *
 * OCSInventory-NG/OCSInventory-ocsreports is distributed in the hope that it
 * will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OCSInventory-NG/OCSInventory-ocsreports. if not, write to the
 * Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 */

/**
 * Renders the stats charts
 */
class StatsChartsRenderer {
    
    public $colorsList = array(
        "#1941A5", //Dark Blue
        "#AFD8F8",
        "#F6BD0F",
        "#8BBA00",
        "#A66EDD",
        "#F984A1",
        "#CCCC00", //Chrome Yellow+Green
        "#999999", //Grey
        "#0099CC", //Blue Shade
        "#FF0000", //Bright Red 
        "#006F00", //Dark Green
        "#0099FF",//Blue (Light)
        "#FF66CC", //Dark Pink
        "#669966", //Dirty green
        "#7C7CB4", //Violet shade of blue
        "#FF9933", //Orange
        "#9900FF", //Violet
        "#99FFCC", //Blue+Green Light
        "#CCCCFF", //Light violet
        "#669900", //Shade of green
    );
    
    /**
     * @param type $name : name of the canvas
     * @param type $legend : show legend or not ?
     */
    public function createChartCanvas($name, $legend = true, $offset = true){
        
        if($legend){
            $mainClass = "col-md-6";
        }else{
            $mainClass = "col-md-12";
        }
        
        if($offset){
            $offset = "col-md-offset-2";
        }else{
            $offset = "";
        }
        
        ?>
        <div class='row <?php echo $offset ?>'>
            <div class='<?php echo $mainClass ?>'>
                <canvas id="<?php echo $name?>" />
            </div>
            <?php if($legend){ ?>
            <div class='col-md-6 text-left'>
                <div id="<?php echo $name ?>legend" class="span-charts">&nbsp;</div>
            </div>
            <?php } ?>
        </div>
        <?php
    }
    
    /**
     * @param string $canvasName Name of the canvas
     * @param array $labels Labals array
     * @param array $data Data arrays
     */
    public function createPieChart($canvasName, $displayName,  $labels, $datas){
        
        ?>
        <script>
        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        <?php
                        foreach ($datas as $data) {
                            echo "$data ,";
                        }
                        ?>
                    ],
                    backgroundColor: [
                        <?php 
                        self::generateColorList(count($labels));
                        ?>
                    ],
                    label: 'Stats'
                }],
                labels: [
                    <?php
                    foreach ($labels as $label) {
                       echo "'$label' ,";
                    }
                    ?>
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: false, 
                },
                title: {
                    display: false,
                    text: "<?php echo $displayName ?>"
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        };
        window.onload = function() {
            var ctx = document.getElementById("<?php echo $canvasName ?>").getContext("2d");
            window.myDoughnut = new Chart(ctx, config);
            document.getElementById("<?php echo $canvasName."legend" ?>").innerHTML = window.myDoughnut.generateLegend();
        };
        </script>
        <?php
        
    }
    
    public function createPointChart($canvasName ,  $labels, $datas, $dataLbl){
        
        ?>
        <script>
        var config = {
            type: 'line',
            data: {
                labels: [<?php 
                    foreach ($labels as $label) {
                       echo "'$label' ,";
                    }
                ?>],
                datasets: [{
                    label: "<?php echo $dataLbl ?>",
                    backgroundColor: "#961b7e",
                    borderColor: "#961b7e",
                    data: [
                        <?php 
                        foreach ($datas as $data) {
                            echo "$data ,";
                        }
                        ?>
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:false,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Day'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };

        window.onload = function() {
            var ctx = document.getElementById("<?php echo $canvasName ?>").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };
        </script>
        <?php
        
    }
    
    /**
     * @param int $nb number of color to create in the list
     */
    static public function generateColorList($nb){
        $stats = new self();
        for ($i = 0; $i <= $nb; $i++) {
            echo "'".$stats->colorsList[$i]."' ,";
        }
    }
    
}