<?php use Prismic\Dom\RichText; ?>

<?php
// dd($slice);
// $num = count($slice->items);
?>
<!-- home-hero -->
<div class="style-container" style="background-image:url( {{ isset($slice->primary->image->url) ? $slice->primary->image->url : '' }} ); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <div id="mainbanner">
        <div id="popmenu_container">
            <div id="menu_bachelor" class="popmenu">
                <a href="javascript:closeMenu('menu_bachelor')" id="close_bachelors" class="close"></a>
                <h3><a href="/undergraduate/bachelors-degrees">BACHELOR'S<br class="no_mobile" /> DEGREES</a></h3>
                <div class="col">
                    <a href="/undergraduate/bachelors-degrees/accounting" class="ssnav headerNav">ACCOUNTING</a>
                    <a href="/undergraduate/bachelors-degrees/business-management" class="ssnav headerNav">BUSINESS MANAGEMENT</a>
                    <a href="/undergraduate/bachelors-degrees/computer-science" class="ssnav headerNav">COMPUTER SCIENCE</a>
                    <a href="/undergraduate/bachelors-degrees/criminal-justice" class="ssnav headerNav">CRIMINAL JUSTICE</a>
                    <a href="/undergraduate/bachelors-degrees/cybersecurity" class="ssnav headerNav">CYBERSECURITY</a>
                    <a href="/undergraduate/bachelors-degrees/finance" class="ssnav headerNav">FINANCE</a>
                </div>
                <div class="col">
                    <a href="/undergraduate/bachelors-degrees/health-care-administration-and-management" class="ssnav headerNav">HEALTHCARE ADMINISTRATION AND MANAGEMENT</a>
                    <a href="/undergraduate/bachelors-degrees/human-resource-management" class="ssnav headerNav">HUMAN RESOURCE MANAGEMENT</a>
                    <a href="/undergraduate/bachelors-degrees/human-services" class="ssnav headerNav">HUMAN SERVICES</a>
                    <a href="/undergraduate/bachelors-degrees/information-technology" class="ssnav headerNav">INFORMATION TECHNOLOGY</a>
                    <a href="/undergraduate/bachelors-degrees/interdisciplinary-professional-studies" class="ssnav headerNav">INTERDISCIPLINARY PROFESSIONAL STUDIES</a>
                </div>
                <div class="col">
                    <a href="/undergraduate/bachelors-degrees/management-information-systems-and-business-analytics" class="ssnav headerNav">MANAGEMENT INFORMATION SYSTEMS AND BUSINESS ANALYTICS</a>
                    <a href="/undergraduate/bachelors-degrees/marketing" class="ssnav headerNav">MARKETING</a>
                    <a href="/undergraduate/bachelors-degrees/organizational-leadership" class="ssnav headerNav">ORGANIZATIONAL LEADERSHIP</a>
                    <a href="/undergraduate/bachelors-degrees/project-management" class="ssnav headerNav">PROJECT MANAGEMENT</a>
                </div>
                <div class="clr"></div>
            </div>
            <div id="menu_master" class="popmenu">
                <a href="javascript:closeMenu('menu_master')" id="close_masters" class="close"></a>
                <h3><a href="/graduate/masters-degrees">MASTER'S<br /> DEGREES</a></h3>
                <div class="col">
                    <a href="/graduate/masters-degrees/business-administration" class="ssnav headerNav">BUSINESS ADMINISTRATION</a>
                    <a href="/graduate/masters-degrees/artificial-intelligence-and-machine-learning" class="ssnav headerNav">ARTIFICIAL INTELLIGENCE (AI) AND MACHINE LEARNING</a>
                    <a href="/graduate/masters-degrees/criminal-justice" class="ssnav headerNav">CRIMINAL JUSTICE</a>
                    <a href="/graduate/masters-degrees/data-analytics" class="ssnav headerNav">DATA ANALYTICS</a>
                    <a href="/graduate/masters-degrees/finance" class="ssnav headerNav">FINANCE</a>
                    <a href="/graduate/masters-degrees/healthcare-administration" class="ssnav headerNav">HEALTHCARE ADMINISTRATION</a>
                                </div>
                <div class="col">
                    <a href="/graduate/masters-degrees/human-resource-management" class="ssnav headerNav">HUMAN RESOURCE MANAGEMENT</a>
                    <a href="/graduate/masters-degrees/information-technology-management" class="ssnav headerNav">INFORMATION TECHNOLOGY MANAGEMENT</a>
                    <a href="/graduate/masters-degrees/interdisciplinary-professional-studies" class="ssnav headerNav">INTERDISCIPLINARY PROFESSIONAL STUDIES</a>
                    <a href="/graduate/masters-degrees/marketing" class="ssnav headerNav">MARKETING</a>
                    <a href="/graduate/masters-degrees/management" class="ssnav headerNav">MANAGEMENT</a>
                    <a href="/graduate/masters-degrees/military-and-emergency-responder-psychology" class="ssnav headerNav">MILITARY AND EMERGENCY RESPONDER PSYCHOLOGY</a>
                </div>
                <div class="col">
                    <a href="/graduate/masters-degrees/nursing" class="ssnav headerNav">NURSING</a>
                    <a href="/graduate/masters-degrees/organizational-leadership" class="ssnav headerNav">ORGANIZATIONAL LEADERSHIP</a>
                    <a href="/graduate/masters-degrees/executive-organizational-leadership" class="ssnav headerNav">ORGANIZATIONAL LEADERSHIP - EXECUTIVE EXPRESS PATH</a>
                    <a href="/graduate/masters-degrees/professional-accounting" class="ssnav headerNav">PROFESSIONAL ACCOUNTING</a>
                    <a href="/graduate/masters-degrees/project-management" class="ssnav headerNav">PROJECT MANAGEMENT</a>
                    <a href="/graduate/masters-degrees/teaching-learning" class="ssnav headerNav">TEACHING AND LEARNING</a>
                </div>
                <div class="clr"></div>
            </div>
        </div>
        <div id="mb_container">
            <h1><div id="tagline1">{{ RichText::asText($slice->primary->title) }}</div>
            <div id="tagline2">{{ RichText::asText($slice->primary->title_1) }}</div></h1>
            <a href="javascript:openMenu('menu_bachelor');" id="btn_bachelor">BACHELOR'S</a>
            <a href="javascript:openMenu('menu_master');" id="btn_master">MASTER'S</a>
        </div>
    </div>
</div>