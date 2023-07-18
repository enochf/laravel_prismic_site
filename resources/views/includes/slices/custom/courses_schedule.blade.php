<?php
include('../resources/views/includes/academic_catalog_assets.blade.php');

// get course scheduling data
$json = file_get_contents('../public/js/courses_'.$currentCatalog.'.json');
$schedule = json_decode($json); 
// var_dump($schedule);
?>

<style>
    #schedule #menu {
        text-align:center;
        color:#cccccc;
        margin-bottom:30px;
    }
    #schedule #menu a {
        font-weight:700;
    }
    #schedule #legend {
        font-weight:700;
        margin-bottom:30px;
    }
    #schedule #legend .leg_item {
        display:inline-block;
        margin-right:50px;
    }
    #schedule .subject {
        padding:15px;
        margin-bottom:10px;
        font-size:22px;
        font-weight:600;
        color:#aa1d40;
        background-color:#f7f7f7;
        border-radius:4px;
    }
    #schedule .subject:hover {
        cursor:pointer;
        background-color:#f1f1f1;
    }
    #schedule .courses {
        display:none;
        padding:30px 20px;
        margin-top:15px;
        background-color:#ffffff;
        border-radius:4px;
    }
    #schedule .courses:hover {
        cursor:default;
    }
    #schedule .course {
        padding:15px;
        margin:0px;
        font-size:16px;
        color:#1c2333;
        border-bottom:1px solid #dddddd;
    }
    #schedule .course:hover {
        cursor:pointer;
    }
    #schedule .code,
    #schedule #legend .leg_item .code {
        display:inline-block;
        padding:4px 10px;
        margin-right:10px;
        width:90px;
        text-align:center;
        font-weight:700;
        color:#ffffff;
        background-color:#aa1d40;
        border-radius:3px;
    }
    #schedule .code.ssa,
    #schedule #legend .leg_item .code.ssa {
        background-color:#18c9b9;
    }
    #schedule .details {
        display:none;
        padding:20px 0px;
        font-weight:300;
        color:#333333;
    }
    #schedule .details:hover {
        cursor:default;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $('#schedule .subject').on('click', function(e) {
            $(this).children('.courses').slideToggle('fast');
        });
        $('#schedule .course').on('click', function(e) {
            $(this).children('.details').slideToggle('fast');
        });
        $('#schedule .courses, #schedule .details').on('click', function(e) {
            e.stopPropagation(); 
        });
    });
</Script>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="schedule">
                <div id="menu">
                    <a href="#sub_a">A</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_b">B</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_c">C</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    D&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_e">E</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_f">F</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_g">G</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_h">H</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_i">I</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    J&nbsp;&nbsp;:&nbsp;&nbsp;
                    K&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_l">L</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_m">M</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_n">N</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_o">O</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_p">P</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    Q&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_r">R</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    <a href="#sub_s">S</a>&nbsp;&nbsp;:&nbsp;&nbsp;
                    T&nbsp;&nbsp;:&nbsp;&nbsp;
                    U&nbsp;&nbsp;:&nbsp;&nbsp;
                    V&nbsp;&nbsp;:&nbsp;&nbsp;
                    W&nbsp;&nbsp;:&nbsp;&nbsp;
                    X&nbsp;&nbsp;:&nbsp;&nbsp;
                    Y&nbsp;&nbsp;:&nbsp;&nbsp;
                    Z
                </div>
                <!-- <div id="legend">
                    <div class="leg_item"><span class="code">EXP202</span> Standard Course</div>
                    <div class="leg_item"><span class="code ssa">EXP202</span> Self Study Assessment</div>
                </div> -->
                <?php
                foreach ($cat->courses->lists as $k => $v) {
                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    // EXCEPTION - filters out the random ART101 TEst Course that I can't seem to delete
                    if ($k != 'Art') {
                        echo '<a name="' . str_replace(" ", "_", $k) . '"></a>';
                        echo '<div class="subject">' . $k . '
                        <a name="sub_'.strtolower(substr($k, 0, 1)).'"></a>    
                        <div class="courses">
                            ';
                            foreach ($v as $k2 => $v2) {
                                // check for SSA and CSU Global Direct
                                if (substr($cat->courses->{$v2[0]}->number, -1) != 'S' && strpos($cat->courses->{$v2[0]}->number, '-D') === false) {
                                    if (substr($cat->courses->{$v2[0]}->number, -1) == 'S') {
                                        $ssa = ' ssa';
                                        $ssa_text = ' (SSA)';
                                    } else {
                                        $ssa = '';
                                        $ssa_text = '';
                                    }
                                    echo '<div class="course">
                                        <span class="code'.$ssa.'">' . $cat->courses->{$v2[0]}->subjectCodeActual . $cat->courses->{$v2[0]}->number . '</span> ' . $cat->courses->{$v2[0]}->title . $ssa_text . '
                                        <div class="details">
                                            <strong>Course Description</strong><br />
                                            ' . (!empty($cat->courses->{$v2[0]}->description) ? strip_tags($cat->courses->{$v2[0]}->description) : '') . '<br />';
                                        if (!empty($cat->courses->{$v2[0]}->prerequisites->rules) && $cat->courses->{$v2[0]}->prerequisites->rules->rules[0]->data->courses) {
                                            echo 'Prerequisite: ';
                                            foreach ($cat->courses->{$v2[0]}->prerequisites->rules->rules[0]->data->courses as $k3 => $v3) {
                                                if (!empty($cat->courses->{$v3})) {
                                                    echo $cat->courses->{$v3}->subjectCodeActual . $cat->courses->{$v3}->number . ' ';
                                                }
                                            }
                                        }
                                    echo '<br /><strong>Credit Hours: ' . $cat->courses->{$v2[0]}->credits->value . '</strong><br /><br />
                                        ';
                                    if (isset($schedule->{$cat->courses->{$v2[0]}->subjectCodeActual . $cat->courses->{$v2[0]}->number})) {
                                        echo '<table class="responsive table table-striped">
                                        <tbody>
                                        <tr>
                                            <th>Term</th>
                                            <th>Class Offered</th>
                                        </tr>
                                            ';
                                            for ($i = 2; $i <= (count($schedule->cols)-1); $i++) {
                                                echo '<tr>
                                                    <td>'.$schedule->cols[$i].'</td>
                                                    <td>'.$schedule->{$cat->courses->{$v2[0]}->subjectCodeActual . $cat->courses->{$v2[0]}->number}[$i].'</td>
                                                </tr>
                                                ';
                                            }
                                        echo '</tbody>
                                        </table>
                                        ';
                                    } else {
                                        echo '-- This course is not scheduled at this time --
                                        ';
                                    }
                                    echo '</div>
                                    </div>
                                    ';
                                }
                            }
                        echo '</div><!-- end courses -->
                            </div><!-- end subject -->
                            ';
                    }
                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                }
                ?> 
            </div>
        </div>
    </div>
</div>





<div id="cat_courses" class="cat_content">
            </div>