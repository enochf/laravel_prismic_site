<?php
include('../resources/views/includes/academic_catalog_assets.blade.php');

list($year1, $year2, $season, $term) = explode("_", $currentCatalog);
?>
<!-- kuali -->
<div id="catalog" class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>
                <div id="versions">
                    <a href="#" id="versions_open">Previous Catalog Versions</a>
                    <div id="versions_container">
                        <?php
                        foreach($cats as $k => $v) {
                            list($y1, $y2, $s, $t) = explode("_", $v['version']);
                            $url = explode('?', $_SERVER['REQUEST_URI']);
                            echo '<a href="'.$url[0].'?cat='.$v['version'].'">'.$y1.'-'.$y2.' '.ucwords($s).' '.ucwords($t).'</a>';
                        }
                        ?>
                    </div>
                </div>
                <?php echo $year1.'-'.$year2.' '.ucwords($season); ?> Academic Catalog
            </h2>
        </div>
    </div>
    <div class="row" id="catalog_content">
        <div class="col-md-3">
            <ul id="cat_nav">
                <li id="cat_hamburger">☰&nbsp;&nbsp;&nbsp;CATALOG MENU</li>
                <div id="mobile_collapse">
                    <li><a href="#" id="cat_nav_home" class="cat_nav_t1">Home</a></li>
                    <li><a href="#" id="cat_nav_welcome" class="cat_nav_t1">Welcome to CSU Global</a>
                        <ul>
                            <li><a href="#" id="cat_nav_intro">Introduction</a></li>
                            <li><a href="#" id="cat_nav_degrees">Degree Programs</a></li>
                            <li><a href="#" id="cat_nav_accreditation">Accreditation and History</a></li>
                            <li><a href="#" id="cat_nav_mission">Mission, Vision and Values</a></li>
                            <li><a href="#" id="cat_nav_diversity">Commitment to Diversity</a></li>
                            <li><a href="#" id="cat_nav_calendars">Academic Calendars</a></li>
                        </ul>
                    </li>
                    <li><a href="#" id="cat_nav_policies" class="cat_nav_t1">Policies</a>
                        <ul>
                            <li><a href="#" id="cat_nav_admissions">Admissions Policies</a></li>
                            <li><a href="#" id="cat_nav_transfer">Transfer Credit Policies</a></li>
                            <li><a href="#" id="cat_nav_academic">Academic Policies</a></li>
                        </ul>
                    </li>
                    <li><a href="#" id="cat_nav_undergraduate" class="cat_nav_t1">Undergraduate Programs</a>
                        <ul>
                            <li><a href="#" id="cat_nav_bachelors">Bachelor's Degrees</a></li>
                            <li><a href="#" id="cat_nav_ugcertificates">Undergraduate Certificates</a></li>
                            <li><a href="#" id="cat_nav_ugspecializations">Undergraduate Specializations</a></li>
                            <li><a href="#" id="cat_nav_ugspecchart">Undergraduate Specializations Chart</a></li>
                        </ul>
                    </li>
                    <li><a href="#" id="cat_nav_graduate" class="cat_nav_t1">Graduate Programs</a>
                        <ul>
                            <li><a href="#" id="cat_nav_masters">Master's Degrees</a></li>
                            <li><a href="#" id="cat_nav_grcertificates">Graduate Certificates</a></li>
                            <li><a href="#" id="cat_nav_grlicensures">Graduate Licensure Programs</a></li>
                            <li><a href="#" id="cat_nav_grspecializations">Graduate Specializations</a></li>
                            <li><a href="#" id="cat_nav_grspecchart">Graduate Specializations Chart</a></li>
                        </ul>
                    </li>
                    <li><a href="#" id="cat_nav_courses" class="cat_nav_t1">Courses</a></li>
                    <!-- <li><a href="#" id="cat_nav_addendum" class="cat_nav_t1">Addendum</a></li> -->
                </div>
            </ul>
        </div>
        <div id="middle_col" class="col-md-7 col-lg-6">

            <div id="cat_home" class="cat_content active">
                <img src="/imgs/catalog/<?php echo $currentCatalog; ?>/cover_front.jpg" alt="CSU Global Catalog Cover" /><br /><br />
                <p><strong>Colorado State University Global</strong></p>
                <h2>Academic Catalog</h2>
                <h3><?php echo ucwords($season) . ' ' . $year1 . '-' . $year2; ?></h3>
                <p>University policies, degree programs, and course descriptions for undergraduate and graduate students.</p>
                <p>The first independent, regionally accredited, 100% online state university in the country.</p>
                <hr>
                <!-- <p>800-920-6723 | CSUGlobal.edu</p> -->
                <p>The Colorado State University Global Campus (CSU Global) Academic Catalog is the official source for academic program information. CSU Global reserves the right to make changes to the catalog in order to fulfill its mission or to accommodate administrative needs in a timely fashion. In the event that such a change is made during the course of a trimester, the catalog will be republished with the alteration clearly indicated. The university will work closely with students to minimize impact should any such change affect their degree progress. For a complete list of student policies, please visit <a href='https://csuglobal.edu/policies'>csuglobal.edu/policies</a>.</p>
                <p><strong>Effective Date:</strong> <?php echo $effective; ?></p>
            </div>
            <div id="cat_intro" class="cat_content">
                <h2>Welcome to CSU Global</h2>
                <img src="/imgs/catalog/pamela_headshot.jpg" alt="Pamela Toney, CSU Global President" class="float-images-left" /><p>Dear Students,</p>
                <p>CSU Global is designed to support modern learners in all different stages of their educational journey. Thank you for choosing CSU Global and trusting in our ability to effectively support you as you pursue your academic goals and prepare for the next phase in your career. CSU Global is the premier provider of higher education online learning experiences, and it is our pleasure to serve you. We hope that your experience at CSU Global will reinforce your ongoing commitment to lifelong learning, personal advancement, and professional success.</p>
                <p>Our staff and faculty are dedicated to ensuring you gain the knowledge and skills necessary to meet the challenges of our technologically advanced and highly dynamic global marketplace. We have carefully selected and crafted our degree programs, specializations, and certificates to prepare you for jobs and careers that have current and forecasted long-term growth. Additionally, our expert faculty hold industry experience and top academic credentials so that you benefit from not only high-quality academic curriculum, but also professional and workplace mentoring and coaching. Through our intentional focus on providing you with career-relevant, flexible, and affordable educational pathways, we work to provide new customized programs, industry alignment, and credit opportunities to help reduce your degree cost and time to completion. </p>
                <p>In fulfillment of our mission as a nonprofit state university, CSU Global provides:</p>
                <ul>
                    <li>Student scholarships every trimester, with no limit to the number of scholarships that students can receive</li>
                    <li>24/7 access to live tutoring, technical support, library resources including a Librarian, and the Career Center</li>
                    <li>Our Tuition Guarantee, which ensures that your tuition will not increase as long as you are an active student; this, along with no student fees and personalized tuition planning, means you can budget and plan successfully for your degree</li>
                </ul>
                <p>Thank you for choosing CSU Global. We are proud of all our students and alumni, and we look forward to helping you achieve personal and workplace success, this year and beyond.</p>
                <p>Sincerely,</p>
                <p>Pamela Toney, CSU Global President</p>
                <img src="/imgs/catalog/pamela_signature.jpg" alt="Pamela Toney, CSU Global President"/>
            </div>
            <div id="cat_degrees" class="cat_content">
                <h2>Degree Programs</h2>
                <?php
                // get bachelor's degrees
                echo '<h3>Bachelor\'s Degrees</h3>';
                foreach ($cat->undergraduate->lists->degrees as $k => $v) {
                    echo str_replace('Bachelor of Science in ', 'B.S. in ', $v) . '<br />';
                }
                // get undergraduate specializations
                echo '<h3>Undergraduate Specializations</h3>';
                foreach ($cat->undergraduate->lists->specializations as $k => $v) {
                    echo str_replace('Undergraduate Specialization in ', '', $v) . '<br />';
                }
                // get master's degrees
                echo '<h3>Master\'s Degrees</h3>';
                foreach ($cat->graduate->lists->degrees as $k => $v) {
                    if (strpos($v, 'Master of Science in ') !== false) {
                        echo str_replace('Master of Science in ', 'M.S. in ', $v) . '<br />';
                    } else {
                        echo $v . '<br />';
                    }
                }
                // get graduate specializations
                echo '<h3>Graduate Specializations</h3>';
                foreach ($cat->graduate->lists->specializations as $k => $v) {
                    echo str_replace('Graduate Specialization in ', '', $v) . '<br />';
                }
                ?>
            </div>
            <div id="cat_accreditation" class="cat_content">
                <h3>Accreditation</h3>
                <p>Colorado State University Global Campus is regionally accredited by The Higher Learning Commission (HLC).</p>
                <p>230 South LaSalle Street, Suite 7-500<br />
                    Chicago, Illinois 60604<br />
                    Phone: (800) 621-7440; (312) 263-0456;<br />
                    Fax: (312) 263-7462</p>
                <p>Prior to receiving independent regional accreditation on June 30, 2011, CSU Global operated under extended accreditation from the Colorado State University System campuses of CSU in Fort Collins (graduate degrees) and CSU-Pueblo (undergraduate degrees). Admitted students starting a degree program prior to September 2011 were offered the option to continue their studies under an extended regional accreditation from CSU System campuses. The following indicator noted on the front of the transcript will identify students enrolled under extended accreditation:</p>
                <ul>
                    <li>Colorado State University-Pueblo online baccalaureate degree completion program offered through CSU Global.</li>
                    <li>Colorado State University online master’s degree program offered through CSU Global.</li>
                </ul>
                <p>All other students pursue a program of study under the CSU Global’ independent regional accreditation. For questions about transferability, or for further information about the accreditation process, visit the Higher Learning Commission website (http://www.ncahigherlearningcommission.org/).</p>
                <p>Select programs from the School of Management and Innovation are also accredited by The Accreditation Council for Business Schools and Programs (ACBSP). These programs include the B.S. in Accounting, B.S. in Business Management, B.S. in Human Resource Management, B.S. in Management Information Systems and Business Analytics, B.S. in Marketing, Master of Finance, Master of Human Resource Management, Master of Professional Accounting, M.S. in International Management, and M.S. in Management. More information about ACBSP accreditation can be found at http://www.acbsp.org.</p>
                <h3>History of Colorado State University Global</h3>
                <p>Colorado State University Global is the newest institution in the Colorado State University System (CSUS), an established university system with a rich 140-year history that evolved from agrarian roots as a land-grant institution. CSU Global was established on August 24, 2007, by the CSUS Board of Governors with a central goal of meeting the educational needs of adult learners in the State of Colorado and beyond by providing high quality online programs. On May 7, 2008, the CSUS Board of Governors delegated authority to CSU Global to oversee academic, personnel, and financial matters consistent with powers granted to CSU and CSU-Pueblo. Thereafter, CSU Global was legally sanctioned as a third, independent university on March 18, 2009, when Colorado's Governor Ritter signed into law the State of Colorado Senate Bill 09-086 declaring the establishment of CSU Global as an online university that is part of the Colorado State University System.</p>
                <p>CSU Global is the first statutorily-defined 100% online public university in the United States. It has a unique focus on the success of adult, nontraditional learners with learning outcomes focused on theory, knowledge, and skills necessary to secure employment and improve job performance. From its first class of nearly 200 students in 2008, CSU Global has now grown to have a student body of over 10,000 students with more than 500 new enrollments admitted each term.</p>
                <p>On June 30, 2011, Colorado State University Global Campus was officially granted independent regional accreditation status by the Higher Learning Commission (HLC) of the North Central Association of
                    Colleges and Schools. CSU Global is the first public university in Colorado to receive initial HLC accreditation since 1971, a significant achievement for the university, the CSU System, and online education.</p>
            </div>
            <div id="cat_mission" class="cat_content">
                <h3>Mission, Vision, and Values</h3>
                <h4>Mission Statement</h4>
                <p>Colorado State University Global is committed to advancing student academic and professional success in a global society, by providing access to dynamic education characterized by excellence, innovative delivery technologies, industry relevance, and strong stakeholder engagement.</p>
                <h4>Vision Statement</h4>
                <p>CSU Global develops professionals for the workforce of the future.</p>
                <h4>University Values</h4>
                <p><strong>We continue to thrive and drive our mission forward because we are: </strong></p>
                <p><strong>Entrepreneurial</strong> - We continually learn, seek opportunities for growth, and believe we can do better with effort and persistence.</p>
                <p><strong>Dedicated</strong> - We provide exceptional service and support to our stakeholders to drive the mission of the university. </p>
                <p><strong>Tenacious</strong> - We focus on getting the job done right, take responsibility for our actions, and thrive on achieving results. </p>
                <p><strong>Agile</strong> - We are flexible in our thinking, focus on solutions, innovative problem-solving, and overcoming obstacles. </p>
                <p><strong>Engaged</strong> - We collaborate, communicate, and motivate one another to achieve excellence.</p>
            </div>
            <div id="cat_diversity" class="cat_content">
                <h3>Commitment to Diversity</h3>
                <p>CSU Global is committed to providing, and has a fundamental responsibility to provide, equal educational opportunities to all individuals with the courage, desire, and dedication to pursue an education and fulfill their aspirations and dreams in a democratic and pluralistic society. CSU Global strives to educate future leaders who will represent diverse perspectives as well as broad cultural experiences.</p>
                <h3>Equal Employment Opportunity</h3>
                <p>Colorado State University System is an equal opportunity/affirmative action employer and complies with all Federal and Colorado State laws, regulations, and executive orders regarding affirmative action requirements. In order to assist the CSU System in meeting its affirmative action responsibilities, ethnic minorities, women, and other protected class members are encouraged to apply and identify themselves.</p>
                <h3>Nondiscrimination Policy</h3>
                <p>CSU Global does not discriminate on the basis of race, age, color, religion, national origin, gender, disability, sexual orientation, veteran status, or disability. CSU Global complies with the Civil Rights Act of 1964, related Executive Orders 11246 and 11375, Title IX of the Education Amendments Act of 1972, Sections 503 and 504 of the Rehabilitation Act of 1973, Section 402 of the Vietnam Era Veteran’s Readjustment Act of 1974, the Age Discrimination in Employment Act of 1967 as amended, the Americans with Disabilities Act of 1990, the Civil Rights Act of 1991, and all civil rights laws of the state of Colorado. Accordingly, equal opportunity for admission shall be extended to all persons, and CSU Global shall promote equal opportunity and treatment through a positive and continuing affirmative action program. In order to assist CSU Global in meeting its affirmative action responsibilities, ethnic minorities, women, and other protected class members are encouraged to apply and to identify themselves.</p>
                <p>Admission of students as well as availability and access to CSU Global programs and activities are made in accordance with policies of nondiscrimination.</p>
                <p>Any CSU Global student who encounters acts of discrimination because of age, race, religion, color, gender, sexual orientation, national origin, veteran status, or disability, either on or off campus, is urged to report such an incident to the Office of Student Success. Any person who wishes to discuss a possible discriminatory act without filling out a complaint form is welcome to do so.</p>
                <p>Any of the above discriminatory acts can also be the subject of complaints to the Department of Education, Office for Civil Rights, as well as to the Office of Federal Contract Compliance Programs, Equal Employment Opportunity Commission, and the Colorado Civil Rights Division.</p>
            </div>
            <div id="cat_calendars" class="cat_content">
                <h3>2020-2021 Academic Calendars</h3>
                <div class="ccm-custom-style-container graybox">
                    <p class="highlighted"><a href="https://info.csuglobal.edu/calendar/burgundy20-21" target="_blank"><img src="/imgs/burgundy20-21-th.png" alt="burgundy20-21-th.png" width="150" id="image-marker" style="float: left; box-shadow: rgb(153, 153, 153) 2px 2px 15px; margin: 0px 20px 15px 0px;"></a><span style="display:block; font-size:20px; font-weight:500; margin-bottom:10px; padding-top:10px;">ACADEMIC CALENDAR:<br />BURGUNDY TRACK 2020-2021</span><br />
                    <a class="downloadLink" href="https://info.csuglobal.edu/calendar/burgundy20-21">+ Download the Calendar</a><br /><br />
                    &nbsp;</p>
                </div>
                <p>&nbsp;</p>
                <div class="ccm-custom-style-container graybox">
                    <p class="highlighted"><a href="https://info.csuglobal.edu/calendar/gold20-21" target="_blank"><img src="/imgs/gold20-21-th.png" alt="gold20-21-th.png" width="150" id="image-marker" style="float: left; box-shadow: rgb(153, 153, 153) 2px 2px 15px; margin: 0px 20px 15px 0px;"></a><span style="display:block; font-size:20px; font-weight:500; margin-bottom:10px; padding-top:10px;">ACADEMIC CALENDAR:<br />GOLD TRACK 2020-2021</span><br />
                    <a class="downloadLink" href="https://info.csuglobal.edu/calendar/gold20-21">+ Download the Calendar</a><br /><br />
                    &nbsp;</p>
                </div>
                <h3>2021-2022 Academic Calendars</h3>
                <div class="ccm-custom-style-container graybox">
                    <p class="highlighted"><a href="https://info.csuglobal.edu/calendar/burgundy21-22" target="_blank"><img src="/imgs/burgundy21-22-th.png" alt="burgundy21-22-th.png" width="150" id="image-marker" style="float: left; box-shadow: rgb(153, 153, 153) 2px 2px 15px; margin: 0px 20px 15px 0px;"></a><span style="display:block; font-size:20px; font-weight:500; margin-bottom:10px; padding-top:10px;">ACADEMIC CALENDAR:<br />BURGUNDY TRACK 2021-2022</span><br />
                    <a class="downloadLink" href="https://info.csuglobal.edu/calendar/burgundy21-22">+ Download the Calendar</a><br /><br />
                    &nbsp;</p>
                </div>
                <p>&nbsp;</p>
                <div class="ccm-custom-style-container graybox">
                    <p class="highlighted"><a href="https://info.csuglobal.edu/calendar/gold21-22" target="_blank"><img src="/imgs/gold21-22-th.png" alt="gold21-22-th.png" width="150" id="image-marker" style="float: left; box-shadow: rgb(153, 153, 153) 2px 2px 15px; margin: 0px 20px 15px 0px;"></a><span style="display:block; font-size:20px; font-weight:500; margin-bottom:10px; padding-top:10px;">ACADEMIC CALENDAR:<br />GOLD TRACK 2021-2022</span><br />
                    <a class="downloadLink" href="https://info.csuglobal.edu/calendar/gold21-22">+ Download the Calendar</a><br /><br />
                    &nbsp;</p>
                </div>
            </div>
            <div id="cat_admissions" class="cat_content">
                <h2>Admissions Policies</h2>
                <?php
                // echo $currentCatalog;
                // exit;
                foreach ($admissionsArray as $v) {
                    if (!empty($cat->policies->{$v})) {
                        echo '<a name="' . str_replace(" ", "_", $v) . '"></a>';
                        if (strpos($v, '>') === false) {
                            echo $cat->policies->{$v};
                        } else {
                            list($parent, $child) = explode(' > ', $v);
                            echo $cat->policies->{$v};
                        }
                        echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                            <p>&nbsp;</p>';
                    }
                }
                ?>
            </div>
            <div id="cat_transfer" class="cat_content">
                <h2>Transfer Policies</h2>
                <?php
                foreach ($transferArray as $v) {
                    if (!empty($cat->policies->{$v})) {
                        echo '<a name="' . str_replace(" ", "_", $v) . '"></a>';
                        if (strpos($v, '>') === false) {
                            echo $cat->policies->{$v};
                        } else {
                            list($parent, $child) = explode(' > ', $v);
                            echo $cat->policies->{$v};
                        }
                        echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                            <p>&nbsp;</p>';
                    }
                }
                ?>
            </div>
            <div id="cat_academic" class="cat_content">
                <h2>Academic Policies</h2>
                <?php
                foreach ($academicArray as $v) {
                    if (!empty($cat->policies->{$v})) {
                        echo '<a name="' . str_replace(" ", "_", $v) . '"></a>';
                        if (strpos($v, '>') === false) {
                            echo $cat->policies->{$v};
                        } else {
                            list($parent, $child) = explode(' > ', $v);
                            echo $cat->policies->{$v};
                        }
                        echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                            <p>&nbsp;</p>';
                    }
                }
                ?>
            </div>
            <div id="cat_bachelors" class="cat_content">
                <h2>Bachelor's Degrees</h2>
                <p>CSU Global offers <?php echo count($cat->undergraduate->lists->degrees); ?> undergraduate programs, which lead to Bachelor of Science degrees:</p>
                <ul>
                    <?php
                    foreach ($cat->undergraduate->lists->degrees as $k => $v) {
                        echo '<li>' . str_replace('Bachelor of Science in ', 'B.S. in ', $v) . '</li>';
                    }
                    ?>
                </ul>
                <?php
                foreach ($cat->undergraduate->degrees as $k => $v) {
                    echo '<a name="' . str_replace(" ", "_", $v->title) . '"></a>';
                    echo '<h3>' . $v->title . '</h3>
                        <p>' . nl2br($v->description) . '</p>
                        <h4>Program Learning Outcomes</h4>
                        <ul>
                        ';
                    foreach ($v->outcomes1 as $k2 => $v2) {
                        echo '<li>' . $v2->value . '</li>';
                    }
                    echo '</ul>
                        ';
                    $courses = $v->graduationRequirements->groupings[0]->rules->rules[0]->data->courses;
                    echo '<h4>Courses</h4>
                        <p>' . $v->courseListPreface . '</p>
                        <ul>
                        ';
                    foreach ($courses as $k2 => $v2) {
                        if (!empty($cat->courses->{$v2})) {
                            echo '<li>' . $cat->courses->{$v2}->subjectCodeActual . $cat->courses->{$v2}->number . ' - ' . $cat->courses->{$v2}->title . '</li>';
                        }
                    }
                    echo '</ul>';
                    if (!empty($v->footnote)) {
                        echo '<p>'.$v->footnote.'</p>';
                    }
                    echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                        <p>&nbsp;</p>';
                }
                ?>
            </div>
            <div id="cat_ugcertificates" class="cat_content">
                <h2>Undergraduate Certificates</h2>
                <p>CSU Global offers credentialed undergraduate certificates that may be declared as a single program of study. Students interested in undergraduate certificate programs must meet university requirements for standard or provisional admission. Certificates may be financial-aid eligible. Please contact a Student Success Counselor with any questions regarding these programs.</p>
                <?php
                foreach ($cat->undergraduate->certificates as $k => $v) {
                    echo '<a name="' . str_replace(" ", "_", $v->title) . '"></a>';
                    echo '<h3>' . $v->title . '</h3>
                        <p>' . nl2br($v->description) . '</p>
                        <h4>Certificate Learning Outcomes</h4>
                        <ul>
                        ';
                    foreach ($v->outcomes1 as $k2 => $v2) {
                        echo '<li>' . $v2->value . '</li>';
                    }
                    echo '</ul>
                        ';
                    $courses = $v->requisites->groupings[0]->rules->rules[0]->data->courses;
                    echo '<h4>Courses</h4>
                        <ul>
                        ';
                    foreach ($courses as $k2 => $v2) {
                        echo '<li>' . $cat->courses->{$v2}->subjectCodeActual . $cat->courses->{$v2}->number . ' - ' . $cat->courses->{$v2}->title . '</li>';
                    }
                    echo '</ul>';
                    if (!empty($v->footnote)) {
                        echo '<p>'.$v->footnote.'</p>';
                    }
                    echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                        <p>&nbsp;</p>';
                }
                ?>
            </div>
            <div id="cat_ugspecializations" class="cat_content">
                <h2>Undergraduate Specializations</h2>
                <p>Students may complete a specialization that consists of five upper division courses (15 credits) as a supplement to their program major. Specializations allow students to select a series of courses in a career-relevant field based on professional and personal interests. Not all specializations are available for all majors. See the Bachelor’s Degree Specialization Chart for more information. Due to course overlap in some programs, a supplemental course may be required to bring the total of classes to five.</p>
                <p>Once a student has completed all the courses within a specialization, they can request a non- transcribable Certificate of Completion to be mailed to them prior to the completion of their degree. Students should contact their Student Success Counselors for more information.</p>
                <?php
                foreach ($cat->undergraduate->specializations as $k => $v) {
                    echo '<a name="' . str_replace(" ", "_", $v->title) . '"></a>';
                    echo '<h3>' . $v->title . '</h3>
                        <p>' . nl2br($v->description) . '</p>
                        <h4>Program Learning Outcomes</h4>
                        <ul>
                        ';
                    foreach ($v->outcomes1 as $k2 => $v2) {
                        echo '<li>' . $v2->value . '</li>';
                    }
                    echo '</ul>
                        ';
                    $courses = $v->requisites->groupings[0]->rules->rules[0]->data->courses;
                    echo '<p>' . $v->specialAdmissionRequirements . '</p>
                        <ul>
                        ';
                    foreach ($courses as $k2 => $v2) {
                        if (!empty($cat->courses->{$v2})) {
                            echo '<li>' . $cat->courses->{$v2}->subjectCodeActual . $cat->courses->{$v2}->number . ' - ' . $cat->courses->{$v2}->title . '</li>';
                        }
                    }
                    echo '</ul>';
                    if (!empty($v->footnote)) {
                        echo '<p>'.$v->footnote.'</p>';
                    }
                    echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                        <p>&nbsp;</p>';
                }
                ?>
            </div>
            <div id="cat_ugspecchart" class="cat_content">
                <p><a href="/imgs/catalog/<?php echo $currentCatalog; ?>/specializations_undergraduate.jpg" target="_blank"><img src="/imgs/catalog/<?php echo $currentCatalog; ?>/specializations_undergraduate.jpg" alt="CSU Global Undergraduate Specializations" /></a></p>
            </div>
            <div id="cat_masters" class="cat_content">
                <h2>Master's Degrees</h2>
                <p>CSU Global offers <?php echo count($cat->graduate->lists->degrees); ?> graduate-level degree programs. These include both academic Master of Science and professional focused Master programs:</p>
                <ul>
                    <?php
                    foreach ($cat->graduate->lists->degrees as $k => $v) {
                        echo '<li>' . $v . '</li>';
                    }
                    ?>
                </ul>
                <p>To ensure success, students who do not fulfill select admission criteria may be required to take one additional credit-bearing course designed to familiarize them expectations for research, writing, and content knowledge. This Master’s Plus course increases the program to 39 credits. Management applicants with GPA or content area deficiencies may be required to take RES500. Organizational Leadership, Criminal Justice, and Healthcare Administration applicants with GPA deficiencies may be required to take RES501. These courses provide students with the opportunity to sharpen their skills and better prepare for the learning objectives of the program.</p>
                <?php
                foreach ($cat->graduate->degrees as $k => $v) {
                    echo '<a name="' . str_replace(" ", "_", $v->title) . '"></a>';
                    echo '<h3>' . $v->title . '</h3>
                        <p>' . nl2br($v->description) . '</p>
                        <h4>Program Learning Outcomes</h4>
                        <ul>
                        ';
                    foreach ($v->outcomes1 as $k2 => $v2) {
                        echo '<li>' . $v2->value . '</li>';
                    }
                    echo '</ul>
                        ';
                    $courses = $v->graduationRequirements->groupings[0]->rules->rules[0]->data->courses;
                    echo '<h4>Courses</h4>
                        <p>' . $v->courseListPreface . '</p>
                        <ul>
                        ';
                    foreach ($courses as $k2 => $v2) {
                        // echo '<li>' . $cat->courses->{$v2}->subjectCodeActual . $cat->courses->{$v2}->number . ' - ' . $cat->courses->{$v2}->title . '</li>';
                        if (!empty($cat->courses->{$v2})) {
                            echo '<li>' . $cat->courses->{$v2}->subjectCodeActual . $cat->courses->{$v2}->number . ' - ' . $cat->courses->{$v2}->title . '</li>';
                        }
                        
                    }
                    echo '</ul>';
                    if (!empty($v->footnote)) {
                        echo '<p>'.$v->footnote.'</p>';
                    }
                    echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                        <p>&nbsp;</p>';
                }
                ?>
            </div>
            <div id="cat_grcertificates" class="cat_content">
                <h2>Graduate Certificates</h2>
                <p>CSU Global offers credentialed graduate certificates that may be declared as a single program of study. Students interested in certificate programs must meet standard admissions requirements. Certificates may be financial aid eligible. Please contact a Student Success Counselor with any questions regarding these programs.</p>
                <p>Students interested in certificate programs should have a firm knowledge of the basic competencies indicated by the learning outcomes. This includes knowledge of specialized terminology, work flow, or technology. A previous exposure to curriculum may be necessary for student success.</p>
                <?php
                foreach ($cat->graduate->certificates as $k => $v) {
                    echo '<a name="' . str_replace(" ", "_", $v->title) . '"></a>';
                    echo '<h3>' . $v->title . '</h3>
                        <p>' . nl2br($v->description) . '</p>
                        <h4>Certificate Learning Outcomes</h4>
                        <ul>
                        ';
                    foreach ($v->outcomes1 as $k2 => $v2) {
                        echo '<li>' . $v2->value . '</li>';
                    }
                    echo '</ul>
                        ';
                    $courses = $v->requisites->groupings[0]->rules->rules[0]->data->courses;
                    echo '<h4>Courses</h4>
                        <ul>
                        ';
                    foreach ($courses as $k2 => $v2) {
                        echo '<li>' . $cat->courses->{$v2}->subjectCodeActual . $cat->courses->{$v2}->number . ' - ' . $cat->courses->{$v2}->title . '</li>';
                    }
                    echo '</ul>';
                    if (!empty($v->footnote)) {
                        echo '<p>'.$v->footnote.'</p>';
                    }
                    echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                        <p>&nbsp;</p>';
                }
                ?>
            </div>
            <div id="cat_grlicensures" class="cat_content">
                <h2>Graduate Licensure Programs</h2>
                <p>The certifying agent for the completion of these Licensure programs is the Colorado State University Global Campus Registrar. Eligibility for licensure is indicated on the official transcript upon completion.</p>
                <?php
                foreach ($cat->graduate->licensures as $k => $v) {
                    echo '<a name="' . str_replace(" ", "_", $v->title) . '"></a>';
                    echo '<h3>' . $v->title . '</h3>
                        <p>' . nl2br($v->description) . '</p>
                        <h4>Certificate Learning Outcomes</h4>
                        <ul>
                        ';
                    foreach ($v->outcomes1 as $k2 => $v2) {
                        echo '<li>' . $v2->value . '</li>';
                    }
                    echo '</ul>
                        ';
                    $courses = $v->requisites->groupings[0]->rules->rules[0]->data->courses;
                    echo '<h4>Courses</h4>
                        <ul>
                        ';
                    foreach ($courses as $k2 => $v2) {
                        echo '<li>' . $cat->courses->{$v2}->subjectCodeActual . $cat->courses->{$v2}->number . ' - ' . $cat->courses->{$v2}->title . '</li>';
                    }
                    echo '</ul>';
                    if (!empty($v->footnote)) {
                        echo '<p>'.$v->footnote.'</p>';
                    }
                    echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                        <p>&nbsp;</p>';
                }
                ?>
            </div>
            <div id="cat_grspecializations" class="cat_content">
                <h2>Graduate Specializations</h2>
                <p>Students must complete a specialization that consists of four graduate courses (12 semester hours of credit) as a supplement to their program major. Specializations allow students to select a series of courses in a career-relevant area based on professional/personal interests.</p>
                <p>Not all specializations are available for all degree programs. See the Master’s Degree Specialization Chart for more information. Students should consult the requirements for their specific degree program prior to starting specialization coursework. Students should complete most major courses for their program (except the capstone prep and capstone project) before taking specialization courses.</p>
                <p>Once a student has completed all the courses within a specialization, they can request a non-transcribable Certificate of Completion to be mailed to them prior to the completion of their degree. Students should contact their Student Success Counselor for more information.</p>
                <?php
                foreach ($cat->graduate->specializations as $k => $v) {
                    echo '<a name="' . str_replace(" ", "_", $v->title) . '"></a>';
                    echo '<h3>' . $v->title . '</h3>
                        <p>' . nl2br($v->description) . '</p>
                        <h4>Program Learning Outcomes</h4>
                        <ul>
                        ';
                    if (!empty($v->outcomes1)) {
                        foreach ($v->outcomes1 as $k2 => $v2) {
                            echo '<li>' . $v2->value . '</li>';
                        }
                    }
                    echo '</ul>
                        ';
                    $courses = $v->requisites->groupings[0]->rules->rules[0]->data->courses;
                    echo '<p>' . $v->specialAdmissionRequirements . '</p>
                        <ul>
                        ';
                    foreach ($courses as $k2 => $v2) {
                        echo '<li>' . $cat->courses->{$v2}->subjectCodeActual . $cat->courses->{$v2}->number . ' - ' . $cat->courses->{$v2}->title . '</li>';
                    }
                    echo '</ul>';
                    if (!empty($v->footnote)) {
                        echo '<p>'.$v->footnote.'</p>';
                    }
                    echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                        <p>&nbsp;</p>';
                }
                ?>
            </div>
            <div id="cat_grspecchart" class="cat_content">
                <p><a href="/imgs/catalog/<?php echo $currentCatalog; ?>/specializations_graduate.jpg" target="_blank"><img src="/imgs/catalog/<?php echo $currentCatalog; ?>/specializations_graduate.jpg" alt="CSU Global Graduate Specializations" /></a></p>
            </div>
            <div id="cat_courses" class="cat_content">
                <h2>Courses of Instruction</h2>
                <?php
                foreach ($cat->courses->lists as $k => $v) {
                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    // EXCEPTION - filters out the random ART101 TEst Course that I can't seem to delete
                    if ($k != 'Art') {
                        echo '<a name="' . str_replace(" ", "_", $k) . '"></a>';
                        echo '<h3>' . $k . '</h3>
                            <p>&nbsp;</p>
                            ';
                        foreach ($v as $k2 => $v2) {
                            if (substr($cat->courses->{$v2[0]}->number, -1) != 'S') {
                                echo '<p><span style="color:#aa1d40; font-weight:bold;">' . $cat->courses->{$v2[0]}->subjectCodeActual . $cat->courses->{$v2[0]}->number . ' - ' . $cat->courses->{$v2[0]}->title . '</span><br />
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
                                echo '<strong>Credit Hours: ' . $cat->courses->{$v2[0]}->credits->value . '</strong>
                                    </p>
                                    <p>&nbsp;</p>';
                            }
                        }
                        echo '<p><a href="javascript:scrollCalendar();" class="backtotop">Back to Top</a></p>
                            <p>&nbsp;</p>';
                    }
                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                }
                ?>
            </div>
            <div id="cat_addendum" class="cat_content">
            </div>

        </div>
        <div id="cat_rs" class="col-md-2 col-lg-3">
            <ul id="rs_nav">
                <?php
                // policies > admissions policies
                foreach ($admissionsArray as $v) {
                    if (!empty($cat->policies->{$v})) {
                        if (strpos($v, '>') === false) {
                            echo '<li class="rs_nav_admissions hidden"><a href="#' . str_replace(" ", "_", $v) . '" class="t1">' . $v . '</a></li>';
                        } else {
                            list($parent, $child) = explode(' > ', $v);
                            echo '<li class="rs_nav_admissions hidden"><a href="#' . str_replace(" ", "_", $v) . '" class="t2">' . $child . '</a></li>';
                        }
                    }
                }
                // policies > transfer policies
                foreach ($transferArray as $v) {
                    if (!empty($cat->policies->{$v})) {
                        if (strpos($v, '>') === false) {
                            echo '<li class="rs_nav_transfer hidden"><a href="#' . str_replace(" ", "_", $v) . '" class="t1">' . $v . '</a></li>';
                        } else {
                            list($parent, $child) = explode(' > ', $v);
                            echo '<li class="rs_nav_transfer hidden"><a href="#' . str_replace(" ", "_", $v) . '" class="t2">' . $child . '</a></li>';
                        }
                    }
                }
                // policies > academic policies
                foreach ($academicArray as $v) {
                    if (!empty($cat->policies->{$v})) {
                        if (strpos($v, '>') === false) {
                            echo '<li class="rs_nav_academic hidden"><a href="#' . str_replace(" ", "_", $v) . '" class="t1">' . $v . '</a></li>';
                        } else {
                            list($parent, $child) = explode(' > ', $v);
                            echo '<li class="rs_nav_academic hidden"><a href="#' . str_replace(" ", "_", $v) . '" class="t2">' . $child . '</a></li>';
                        }
                    }
                }
                // undergraduate > bachelor's degrees
                foreach ($cat->undergraduate->lists->degrees as $v) {
                    echo '<li class="rs_nav_bachelors hidden"><a href="#' . str_replace(" ", "_", $v) . '">' . str_replace('Bachelor of Science', 'B.S.', $v) . '</a></li>';
                }
                // undergraduate > certificates
                foreach ($cat->undergraduate->lists->certificates as $v) {
                    echo '<li class="rs_nav_ugcertificates hidden"><a href="#' . str_replace(" ", "_", $v) . '">' . str_replace('Undergraduate Certificate in ', '', $v) . '</a></li>';
                }
                // undergraduate > specializations
                foreach ($cat->undergraduate->lists->specializations as $v) {
                    echo '<li class="rs_nav_ugspecializations hidden"><a href="#' . str_replace(" ", "_", $v) . '">' . str_replace('Undergraduate Specialization in ', '', $v) . '</a></li>';
                }
                // undergraduate > master's degrees
                foreach ($cat->graduate->lists->degrees as $v) {
                    echo '<li class="rs_nav_masters hidden"><a href="#' . str_replace(" ", "_", $v) . '">' . str_replace('Master of Science', 'M.S.', $v) . '</a></li>';
                }
                // undergraduate > certificates
                foreach ($cat->graduate->lists->certificates as $v) {
                    echo '<li class="rs_nav_grcertificates hidden"><a href="#' . str_replace(" ", "_", $v) . '">' . str_replace('Graduate Certificate in ', '', $v) . '</a></li>';
                }
                // undergraduate > licensures
                foreach ($cat->graduate->lists->licensures as $v) {
                    echo '<li class="rs_nav_grlicensures hidden"><a href="#' . str_replace(" ", "_", $v) . '">' . str_replace('Graduate Licensure Program in ', '', $v) . '</a></li>';
                }
                // undergraduate > specializations
                foreach ($cat->graduate->lists->specializations as $v) {
                    echo '<li class="rs_nav_grspecializations hidden"><a href="#' . str_replace(" ", "_", $v) . '">' . str_replace('Undergraduate Specialization in ', '', $v) . '</a></li>';
                }
                // courses
                foreach ($cat->courses->lists as $k => $v) {
                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    // EXCEPTION - filters out the random ART101 TEst Course that I can't seem to delete
                    if ($k != 'Art') {
                        echo '<li class="rs_nav_courses hidden"><a href="#' . str_replace(" ", "_", $k) . '">' . $k . '</a></li>';
                    }
                    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div id="catalog_end" class="container"></div>