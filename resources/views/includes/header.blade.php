<!-- header -->
<div id="covidAlert">
    <div class="container">
        <p><strong>COVID-19 UPDATE:</strong>&nbsp;&nbsp;&nbsp;<span><a href="/covid-19-support">Latest CSU Global Updates</a></span></p>
    </div>
</div>

<div id="header_mobile">
    <span id="hamburger">&#9776;</span>
    <a href="/" id="mobile-header-Logo"><img src="{{ asset('imgs/logo_csuglobal.png') }}" width="264" height="54" alt="COLORADO STATE UNIVERSITY GLOBAL - 100% Online Accredited Degrees" title="COLORADO STATE UNIVERSITY GLOBAL - 100% Online Accredited Degrees" id="logo_csug"></a>
    @if (!isset($prismic->data->hide_rfi) || $prismic->data->hide_rfi == false)
        <a href="javascript:void(0)" id="requestInfo" class="mobile_only"><img src="{{ asset('imgs/teal_arrow_down.png') }}" alt="arrow down" id="requestArrow"> Request Info
    @endif

    <div id="mobile-header-bottom-row" class="container-fluid">
        <div class="row">
            <form id="mobile_search" class="mobile_only" role="search">
                <input name="search_paths[]" type="hidden" value="" />
                <input class="st-default-search-input header-input" type="text" name="query" aria-label="search" placeholder="Search for...">
                <input tabindex="-1" type="submit" name="submit" value="Search" id="mobile_searchSubmit" />
            </form>
            <div id="mobile-header-bottom-row-inner">
                <a href="javascript:mainnav.open('UG')" class="mnav">Undergraduate</a>
                <a href="javascript:mainnav.open('GR')" class="mnav">Graduate</a>
                <a href="javascript:mainnav.open('CO')" class="mnav">Cost</a>
                <a href="javascript:mainnav.open('AM')" class="mnav">Admissions</a>
                <a href="javascript:mainnav.open('RS')" class="mnav">Resources</a>
                <a href="javascript:mainnav.open('AB')" class="mnav last">About</a>
                <hr class="mobile_only">
                <a href="/new-students" class="mnav mobile_only aud">New Students</a>
                <a href="/current-students" class="mnav mobile_only aud">Current Students</a>
                <a href="/alumni" class="mnav mobile_only aud">Alumni</a>
                <a href="/military" class="mnav mobile_only aud">Military</a>
                <a href="/international-students" class="mnav mobile_only aud">International Students</a>
                <a href="/admissions/transfer-info" class="mnav mobile_only aud">Transfer Students</a>
                <a href="/about/partnerships" class="mnav mobile_only aud">Partnerships</a>
            </div>
        </div>
    </div>
</div>

<div id="header_desktop_container">
    <div class="container-fluid desktop-header">
        <div class="row">
            <div class="desktop-header-top-row">
                <div class="desktop-header-top-row-left-column">
                    <p><span>Colorado State University Global</span> - 100% Online Degrees &amp; Certificates</p>
                </div>
                <div class="desktop-header-top-row-right-column">
                    <a id="header-phone" class="pardotTrackClick" href="tel:8004627845">
                        <svg width="15" height="22" viewBox="0 0 15 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.5 20.2934L11.4191 14.3477C11.4121 14.3513 9.69188 15.1965 9.61313 15.2324C7.65313 16.1826 3.664 8.38987 5.58025 7.36263L7.40288 6.46487L4.3465 0.5L2.50375 1.40913C-3.798 4.69475 6.20763 24.1434 12.6538 21.1973C12.7596 21.1491 14.493 20.2969 14.5 20.2934Z" fill="#AA1D40"/>
                        </svg>
                        (800) 462-7845
                    </a>
                    <button id="header-chat" aria-label="Click to open Live Chat" onclick="window.open('https://home-c28.incontact.com/incontact/chatclient/chatclient.aspx?poc=fe583801-12a3-41b5-84b9-f949034df884&bu=4598395&P1=FirstName&P2=LastName&P3=first.last@company.com&P4=555-555-5555','chatWindow','location=no,height=630,menubar=no,status=no,width=410',true); return false;" type="button">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.1666 18.4621C12.7584 19.5358 9.5445 16.8338 9.5445 13.941C9.5445 11.1629 12.2657 9.15739 15.2723 9.15739C18.2971 9.15739 21 11.1778 21 13.941C21 14.921 20.6474 15.8835 20.0226 16.6299C19.9972 17.5049 20.5109 18.7605 20.9746 19.674C19.733 19.4491 17.9664 18.953 17.1666 18.4621ZM7.7945 13.941C7.7945 10.3386 11.1493 7.40739 15.2723 7.40739C16.0475 7.40739 16.7948 7.51151 17.4982 7.70314C17.4799 3.47339 13.3324 0.424011 8.75 0.424011C4.12912 0.424011 0 3.51014 0 7.73201C0 9.22826 0.538125 10.6991 1.49188 11.8401C1.533 13.1763 0.74725 15.0934 0.0385 16.489C1.9355 16.1469 4.634 15.3883 5.85637 14.6384C6.559 14.8099 7.23537 14.9044 7.89337 14.956C7.83475 14.6244 7.7945 14.2866 7.7945 13.941Z" fill="#AA1D40"/>
                        </svg>
                        Live Chat
                    </button>
                    <a id="header-login" class="pardotTrackClick last" href="https://portal.csuglobal.edu" target="_blank">
                        <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 0.5C4.70138 0.5 0 5.20138 0 11C0 16.7986 4.70138 21.5 10.5 21.5C16.2986 21.5 21 16.7986 21 11C21 5.20138 16.2986 0.5 10.5 0.5ZM17.2839 16.5169C17.0555 16.0041 16.5935 15.6497 15.6467 15.431C13.6404 14.9681 11.7723 14.5621 12.6779 12.8541C15.4298 7.65488 13.4067 4.875 10.5 4.875C7.5355 4.875 5.5615 7.76163 8.32212 12.8541C9.25488 14.5726 7.31763 14.9777 5.35325 15.431C4.40475 15.6497 3.94625 16.0067 3.71962 16.5212C2.49025 15.0136 1.75 13.0921 1.75 11C1.75 6.17525 5.67525 2.25 10.5 2.25C15.3247 2.25 19.25 6.17525 19.25 11C19.25 13.0904 18.5106 15.0101 17.2839 16.5169Z" fill="#AA1D40"/>
                        </svg>
                        Login
                    </a>
                    <div id="header-information-for-container">
                        <button class="button-information-for" aria-label="Click to open the menu" aria-controls="audience_desktop_container" aria-expanded="false" onClick="mainnav.showInformationForMenu(this);" type="button">
                                Information For <img id="" src="/imgs/header-chevron.svg" alt="">
                        </button>
                        <div id="header-information-for-container-nav" role="region" aria-labelledby="header-information-for">
                            <button class="button-information-for" id="button-information-for-open" aria-label="Click to open the menu" aria-controls="audience_desktop_container" aria-expanded="false" onClick="mainnav.showInformationForMenu(this);" type="button">
                                    Information For <img id="" src="/imgs/header-chevron.svg" alt="">
                            </button>
                            <nav id="audience">
                                <ul>
                                    <li><a href="/new-students">New Students</a></li>
                                    <li><a href="/current-students">Current Students</a></li>
                                    <li><a href="/alumni">Alumni</a></li>
                                    <li><a href="/military">Military</a></li>
                                    <li><a href="/international-students">International Students</a></li>
                                    <li><a href="/admissions/transfer-info">Transfer Students</a></li>
                                    <li><a href="/about/partnerships">Partnerships</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header_desktop">
        <div class="container-fluid desktop-header">
            <div class="row">
                <a href="/" id="headerLogo"><img src="{{ asset('imgs/logo_csuglobal.png') }}" width="264" height="54" alt="COLORADO STATE UNIVERSITY GLOBAL - 100% Online Accredited Degrees" title="COLORADO STATE UNIVERSITY GLOBAL - 100% Online Accredited Degrees" id="logo_csug"></a>

                <div id="maincta" class="fr no_mobile">
                    <a href="/request-information" id="requestinfo" class="cta-button cta-button--white">Request Info</a>
                    <a href="/student-application" id="applynow" class="cta-button cta-button--cardinal">Apply Now &#x2794;</a>
                </div>
            </div>
        </div>

        <!--@if (!isset($prismic->data->hide_rfi) || $prismic->data->hide_rfi == false)

        <a href="#" id="requestInfo" class="mobile_only"><img src="{{ asset('imgs/teal_arrow_down.png') }}" alt="arrow down" id="requestArrow" />&nbsp;&nbsp;REQUEST INFO</a>

        @endif -->

        <div class="container-fluid desktop-header-bottom-row">
            <div class="row">
                <div class="desktop-header-bottom-row-inner">
                    <a href="javascript:mainnav.open('UG')" class="mnav">Undergraduate</a>
                    <a href="javascript:mainnav.open('GR')" class="mnav">Graduate</a>
                    <a href="javascript:mainnav.open('CO')" class="mnav">Cost</a>
                    <a href="javascript:mainnav.open('AM')" class="mnav">Admissions</a>
                    <a href="javascript:mainnav.open('RS')" class="mnav">Resources</a>
                    <a href="javascript:mainnav.open('AB')" class="mnav">About</a>
                    <div id="header-search">
                        <button onClick="javascript:mainnav.toggleSearch('open')" type="button" id="st-search-input-open" class="mnav pardotTrackClick" aria-label="Click to open search form" aria-controls="desktop-search" aria-pressed="false">
                            Search
                        </button>
                        <form id="desktop-search" role="search">
                            <input name="search_paths[]" type="hidden" value="" />
                            <input id="st-search-input" class="st-search-input header-input" type="text" name="query" aria-label="search" placeholder="Search for...">
                            <button onClick="javascript:mainnav.toggleSearch('close')" id="st-search-input-close" type="button" aria-label="Click to close search form" aria-controls="search">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.977 10.515L7.38499 5.96749L11.931 1.38049L10.515 -0.0230103L5.96999 4.56649L1.38199 0.0224897L-0.0230103 1.42749L4.56999 5.97999L0.0224897 10.572L1.42749 11.977L5.98349 7.38099L10.5735 11.931L11.977 10.515Z" fill="#999999"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="subheader_desktop_container">
    <div id="subheader_desktop">

        <a href="javascript:mainnav.close()" id="desktop_nav_close" class="no_mobile"></a>
        <a href="#" class="sectiontitle headerNav no_mobile"></a>

        <!-- UNDERGRADUATE -->
        <div id="UG" class="section">
            <div class="col col1">

                <a href="javascript:mainnav.back(2);" class="mobile_only back"><span>Back to</span><br />MAIN MENU</a>
                <hr class="mobile_only">
                <a href="/undergraduate" class="mobile_only main">UNDERGRADUATE</a>
                <hr class="mobile_only">

                <a href="javascript:mainnav.getSub('UG_bachedorsdegrees')" class="snav active headerNav">BACHELOR'S DEGREES</a>
                <a href="javascript:mainnav.getSub('UG_certificates')" class="snav headerNav">CERTIFICATES</a>
                <a href="javascript:mainnav.getSub('UG_specializations')" class="snav headerNav">SPECIALIZATIONS</a>
                <a href="/undergraduate/general-education" class="snav headerNav single">GENERAL EDUCATION</a>
                <a href="/about/schools-and-programs/areas-study" class="snav headerNav single">AREAS OF STUDY</a>
                <a href="javascript:mainnav.getSub('UG_alternative')" class="snav headerNav">ALTERNATIVE CREDIT OPTIONS</a>
                <a href="javascript:mainnav.getSub('UG_plp')" class="snav headerNav">PERSONALIZED LEARNING PATHS</a>
                <a href="/direct" class="snav headerNav single last" target="_blank">CSU GLOBAL DIRECT</a>
                <a href="/resources/academic-catalog" class="snav headerNav single last">ACADEMIC CATALOG</a>
            </div>
            <div id="UG_bachedorsdegrees" class="subsub default">
                <a href="/undergraduate/bachelors-degrees" class="mainpage headerNav no_mobile">BACHELOR'S DEGREES <span>Main Page &#187;</span></a>
                <div class="col col2">
                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />UNDERGRADUATE</a>
                    <hr class="mobile_only">
                    <a href="/undergraduate/bachelors-degrees" class="mobile_only main">BACHELOR'S DEGREES</a>
                    <hr class="mobile_only">

                    <a href="/undergraduate/bachelors-degrees/accounting" class="ssnav headerNav">ACCOUNTING</a>
                    <a href="/undergraduate/bachelors-degrees/business-management" class="ssnav headerNav">BUSINESS MANAGEMENT</a>
                    <a href="/undergraduate/bachelors-degrees/computer-science" class="ssnav headerNav">COMPUTER SCIENCE</a>
                    <a href="/undergraduate/bachelors-degrees/criminal-justice" class="ssnav headerNav">CRIMINAL JUSTICE</a>
                    <a href="/undergraduate/bachelors-degrees/cybersecurity" class="ssnav headerNav">CYBERSECURITY</a>
                    <a href="/undergraduate/bachelors-degrees/finance" class="ssnav headerNav">FINANCE</a>
                </div>
                <div class="col col3">

                    <a href="/undergraduate/bachelors-degrees/health-care-administration-and-management" class="ssnav headerNav">HEALTHCARE ADMINISTRATION AND MANAGEMENT</a>
                    <a href="/undergraduate/bachelors-degrees/human-resource-management" class="ssnav headerNav">HUMAN RESOURCE MANAGEMENT</a>
                    <a href="/undergraduate/bachelors-degrees/human-services" class="ssnav headerNav">HUMAN SERVICES</a>
                    <a href="/undergraduate/bachelors-degrees/information-technology" class="ssnav headerNav">INFORMATION TECHNOLOGY</a>
                    <a href="/undergraduate/bachelors-degrees/interdisciplinary-professional-studies" class="ssnav headerNav">INTERDISCIPLINARY PROFESSIONAL STUDIES</a>
                </div>
                <div class="col col4">

                    <a href="/undergraduate/bachelors-degrees/management-information-systems-and-business-analytics" class="ssnav headerNav">MANAGEMENT INFORMATION SYSTEMS AND BUSINESS ANALYTICS</a>
                    <a href="/undergraduate/bachelors-degrees/marketing" class="ssnav headerNav">MARKETING</a>
                    <a href="/undergraduate/bachelors-degrees/organizational-leadership" class="ssnav headerNav">ORGANIZATIONAL LEADERSHIP</a>
                    <a href="/undergraduate/bachelors-degrees/project-management" class="ssnav headerNav">PROJECT MANAGEMENT</a>
                </div>
                <div class="col col5">
                </div>
            </div>
            <div id="UG_certificates" class="subsub">
                <a href="/undergraduate/certificates" class="mainpage headerNav no_mobile">CERTIFICATES<span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />UNDERGRADUATE</a>
                    <hr class="mobile_only">
                    <a href="/undergraduate/certificates" class="mobile_only main">CERTIFICATES</a>
                    <hr class="mobile_only">

                    <a href="/undergraduate/certificates/business-administration" class="ssnav headerNav">BUSINESS ADMINISTRATION</a>
                    <a href="/undergraduate/certificates/computer-programming" class="ssnav headerNav">COMPUTER PROGRAMMING</a>
                    <a href="/undergraduate/certificates/cyber-security" class="ssnav headerNav">CYBERSECURITY</a>
                    <a href="/undergraduate/certificates/data-management-and-analysis" class="ssnav headerNav">DATA MANAGEMENT AND ANALYSIS</a>
                </div>
                <div class="col col3">

                    <a href="/undergraduate/certificates/digital-marketing" class="ssnav headerNav">DIGITAL MARKETING</a>
                    <a href="/undergraduate/certificates/fundraising" class="ssnav headerNav">FUNDRAISING</a>
                    <a href="/undergraduate/certificates/information-technology-operations" class="ssnav headerNav">INFORMATION TECHNOLOGY OPERATIONS</a>
                    <a href="/undergraduate/certificates/marketing" class="ssnav headerNav">MARKETING</a>
                </div>
                <div class="col col4">
                    <a href="/undergraduate/certificates/networking" class="ssnav headerNav">NETWORKING</a>
                    <a href="/undergraduate/certificates/project-management" class="ssnav headerNav">PROJECT MANAGEMENT</a>
                    <a href="/undergraduate/certificates/web-application-development" class="ssnav headerNav">WEB APPLICATION DEVELOPMENT</a>
                </div>
            </div>
            <div id="UG_specializations" class="subsub">
                <a href="/undergraduate/specializations" class="mainpage headerNav no_mobile">SPECIALIZATIONS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />UNDERGRADUATE</a>
                    <hr class="mobile_only">
                    <a href="/undergraduate/specializations" class="mobile_only main">SPECIALIZATIONS</a>
                    <hr class="mobile_only">
                    <a href="/undergraduate/specializations/applied-clinical-social-sciences" class="ssnav headerNav">APPLIED CLINICAL SOCIAL SCIENCES</a>
                    <a href="/undergraduate/specializations/artificial-intelligence-ai-and-robotics" class="ssnav headerNav">ARTIFICIAL INTELLIGENCE (AI) AND ROBOTICS</a>
                    <a href="/undergraduate/specializations/business-administration" class="ssnav headerNav">BUSINESS ADMINISTRATION</a>
                    <a href="/undergraduate/specializations/communication" class="ssnav headerNav">COMMUNICATION</a>
                    <a href="/undergraduate/specializations/construction-management" class="ssnav headerNav">CONSTRUCTION MANAGEMENT</a>
                    <a href="/undergraduate/specializations/cyber-security" class="ssnav headerNav">CYBERSECURITY</a>
                </div>
                <div class="col col3">
                    <a href="/undergraduate/specializations/data-management-and-analysis" class="ssnav headerNav">DATA MANAGEMENT AND ANALYSIS</a>
                    <a href="/undergraduate/specializations/digital-marketing" class="ssnav headerNav">DIGITAL MARKETING</a>
                    <a href="/undergraduate/specializations/fundraising" class="ssnav headerNav">FUNDRAISING</a>
                    <a href="/undergraduate/specializations/healthcare-management" class="ssnav headerNav">HEALTHCARE MANAGEMENT</a>
                    <a href="/undergraduate/specializations/human-resources-and-organizational-development" class="ssnav headerNav">HUMAN RESOURCES AND ORGANIZATIONAL DEVELOPMENT</a>

                </div>
                <div class="col col4">
                    <a href="/undergraduate/specializations/information-technology-management" class="ssnav headerNav">INFORMATION TECHNOLOGY MANAGEMENT</a>
                    <a href="/undergraduate/specializations/intelligence-and-homeland-security" class="ssnav headerNav">INTELLIGENCE AND HOMELAND SECURITY</a>
                    <a href="/undergraduate/specializations/international-business" class="ssnav headerNav">INTERNATIONAL BUSINESS</a>
                    <a href="/undergraduate/specializations/marketing" class="ssnav headerNav">MARKETING</a>
                    <a href="/undergraduate/specializations/organizational-leadership" class="ssnav headerNav">ORGANIZATIONAL LEADERSHIP</a>

                </div>
                <div class="col col5">
                    <a href="/undergraduate/specializations/project-management" class="ssnav headerNav">PROJECT MANAGEMENT</a>
                    <a href="/undergraduate/specializations/public-relations" class="ssnav headerNav">PUBLIC RELATIONS</a>
                    <a href="/undergraduate/specializations/virtualization-and-cloud-computing" class="ssnav headerNav">VIRTUALIZATION AND CLOUD COMPUTING</a>
                    <a href="/undergraduate/specializations/web-application-development" class="ssnav headerNav">WEB APPLICATION DEVELOPMENT</a>
                    <a href="/undergraduate/specializations" class="ssnav headerNav viewall">VIEW ALL SPECIALIZATIONS »</a>
            </div>
            </div>
            <div id="UG_generaleducation" class="subsub">
                <a href="/undergraduate/general-education" class="mainpage headerNav no_mobile single">GENERAL EDUCATION <span>Main Page &#187;</span></a>
            </div>
            <div id="UG_areasofstudy" class="subsub">
                <a href="/about/schools-and-programs/areas-study" class="mainpage headerNav no_mobile single">AREAS OF STUDY <span>Main Page &#187;</span></a>
            </div>
            <div id="UG_alternative" class="subsub">
                <a href="/undergraduate/alternative-credit-options" class="mainpage headerNav no_mobile">ALTERNATIVE CREDIT OPTIONS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />UNDERGRADUATE</a>
                    <hr class="mobile_only">
                    <a href="/undergraduate/alternative-credit-options" class="mobile_only main">ALTERNATIVE CREDIT OPTIONS</a>
                    <hr class="mobile_only">

                    <a href="/undergraduate/alternative-credit-options/self-study-assessments" class="ssnav headerNav">SELF-STUDY ASSESSMENTS</a>
                    <a href="/undergraduate/alternative-credit-options/prior-learning-assessment-pla" class="ssnav headerNav">PRIOR LEARNING ASSESSMENT</a>
                    <a href="/undergraduate/alternative-credit-options/credit-exam" class="ssnav headerNav">CREDIT BY EXAM</a>
                    <a href="/undergraduate/alternative-credit-options/information-technology-certifications" class="ssnav headerNav">INFORMATION TECHNOLOGY CERTIFICATIONS</a>
                </div>
            </div>
            <div id="UG_plp" class="subsub">
                <a href="/personalized-learning-paths" class="mainpage headerNav no_mobile">PERSONALIZED LEARNING PATHS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />UNDERGRADUATE</a>
                    <hr class="mobile_only">
                    <a href="/personalized-learning-paths" class="mobile_only main">PERSONALIZED LEARNING PATHS</a>
                    <hr class="mobile_only">

                    <a href="/personalized-learning-paths/stackable-credentials" class="ssnav headerNav">STACKABLE CREDENTIALS</a>
                </div>
            </div>
            <div id="UG_academiccatalog" class="subsub">
                <a href="/resources/academic-catalog" class="mainpage headerNav no_mobile single">ACADEMIC CATALOG <span>Main Page &#187;</span></a>
            </div>
            <div class="clr"></div>
        </div>

        <!-- GRADUATE -->
        <div id="GR" class="section">
            <div class="col col1">

                <a href="javascript:mainnav.back(2);" class="mobile_only back"><span>Back to</span><br />MAIN MENU</a>
                <hr class="mobile_only">
                <a href="/graduate" class="mobile_only main">GRADUATE</a>
                <hr class="mobile_only">

                <a href="javascript:mainnav.getSub('GR_mastersdegrees')" class="snav active headerNav">MASTER'S DEGREES</a>
                <a href="javascript:mainnav.getSub('GR_certificates')" class="snav headerNav">CERTIFICATES</a>
                <a href="javascript:mainnav.getSub('GR_specializations')" class="snav headerNav">SPECIALIZATIONS</a>
                <a href="javascript:mainnav.getSub('GR_k12educators')" class="snav headerNav">K-12 EDUCATORS</a>
                <a href="/about/schools-and-programs/areas-study" class="snav headerNav single">AREAS OF STUDY</a>
                <a href="/resources/academic-catalog" class="snav headerNav single last">ACADEMIC CATALOG</a>
            </div>
            <div id="GR_mastersdegrees" class="subsub default">
                <a href="/graduate/masters-degrees" class="mainpage headerNav no_mobile">MASTER'S DEGREES <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />GRADUATE</a>
                    <hr class="mobile_only">
                    <a href="/graduate/masters-degrees" class="mobile_only main">MASTER'S DEGREES</a>
                    <hr class="mobile_only">

                    <a href="/graduate/masters-degrees/business-administration" class="ssnav headerNav">BUSINESS ADMINISTRATION</a>
                    <a href="/graduate/masters-degrees/artificial-intelligence-and-machine-learning" class="ssnav headerNav">ARTIFICIAL INTELLIGENCE AND MACHINE LEARNING</a>
                    <a href="/graduate/masters-degrees/criminal-justice" class="ssnav headerNav">CRIMINAL JUSTICE</a>
                    <a href="/graduate/masters-degrees/data-analytics" class="ssnav headerNav">DATA ANALYTICS</a>
                    <a href="/graduate/masters-degrees/finance" class="ssnav headerNav">FINANCE</a>
                    <a href="/graduate/masters-degrees/healthcare-administration" class="ssnav headerNav">HEALTHCARE ADMINISTRATION</a>

                </div>
                <div class="col col3">
                    <a href="/graduate/masters-degrees/human-resource-management" class="ssnav headerNav">HUMAN RESOURCE MANAGEMENT</a>
                    <a href="/graduate/masters-degrees/information-technology-management" class="ssnav headerNav">INFORMATION TECHNOLOGY MANAGEMENT</a>
                    <a href="/graduate/masters-degrees/interdisciplinary-professional-studies" class="ssnav headerNav">INTERDISCIPLINARY PROFESSIONAL STUDIES</a>
                    <a href="/graduate/masters-degrees/marketing" class="ssnav headerNav">MARKETING</a>
                    <a href="/graduate/masters-degrees/management" class="ssnav headerNav">MANAGEMENT</a>
                </div>
                <div class="col col4">
                    <a href="/graduate/masters-degrees/military-and-emergency-responder-psychology" class="ssnav headerNav">MILITARY AND EMERGENCY RESPONDER PSYCHOLOGY</a>
                    <a href="/graduate/masters-degrees/organizational-leadership" class="ssnav headerNav">ORGANIZATIONAL LEADERSHIP</a>
                    <a href="/graduate/masters-degrees/organizational-leadership-executive-express-path" class="ssnav headerNav">ORGANIZATIONAL LEADERSHIP - EXECUTIVE EXPRESS PATH</a>
                    <a href="/graduate/masters-degrees/professional-accounting" class="ssnav headerNav">PROFESSIONAL ACCOUNTING</a>
                    <a href="/graduate/masters-degrees/project-management" class="ssnav headerNav">PROJECT MANAGEMENT</a>
                    <a href="/graduate/masters-degrees/teaching-learning" class="ssnav headerNav">TEACHING AND LEARNING</a>
                </div>
                <div class="col col5">
                </div>
            </div>
            <div id="GR_certificates" class="subsub">
                <a href="/graduate/certificates" class="mainpage headerNav no_mobile">CERTIFICATES <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />GRADUATE</a>
                    <hr class="mobile_only">
                    <a href="/graduate/certificates" class="mobile_only main">CERTIFICATES</a>
                    <hr class="mobile_only">

                    <a href="/graduate/certificates/business-analytics" class="ssnav headerNav">BUSINESS ANALYTICS</a>
                    <a href="/graduate/certificates/cyber-security" class="ssnav headerNav">CYBERSECURITY</a>
                    <a href="/graduate/certificates/principal-licensure" class="ssnav headerNav">EDUCATIONAL LEADERSHIP - PRINCIPAL LICENSURE</a>
                    <a href="/graduate/certificates/digital-instructional-architecture" class="ssnav headerNav">DIGITAL INSTRUCTIONAL ARCHITECTURE</a>
                </div>
                <div class="col col3">

                    <a href="/graduate/certificates/human-resource-management" class="ssnav headerNav">HUMAN RESOURCE MANAGEMENT</a>
                    <a href="/graduate/certificates/project-management" class="ssnav headerNav">PROJECT MANAGEMENT</a>
                </div>
            </div>
            <div id="GR_specializations" class="subsub">
                <a href="/graduate/specializations" class="mainpage headerNav no_mobile">SPECIALIZATIONS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />GRADUATE</a>
                    <hr class="mobile_only">
                    <a href="/graduate/specializations" class="mobile_only main">SPECIALIZATIONS</a>
                    <hr class="mobile_only">

                    <a href="/graduate/specializations/accounting" class="ssnav headerNav">ACCOUNTING</a>
                    <a href="/graduate/specializations/business-intelligence" class="ssnav headerNav">BUSINESS INTELLIGENCE</a>
                    <a href="/graduate/specializations/criminal-justice-leadership" class="ssnav headerNav">CRIMINAL JUSTICE LEADERSHIP</a>
                    <a href="/graduate/specializations/cyber-security" class="ssnav headerNav">CYBERSECURITY</a>
                    <a href="/graduate/specializations/english-k-12-educators" class="ssnav headerNav">ENGLISH K-12 EDUCATORS</a>
                    <a href="/graduate/specializations/english-language-learning-ell" class="ssnav headerNav">ENGLISH LANGUAGE LEARNING</a>
                </div>
                <div class="col col3">
                    <a href="/graduate/specializations/global-management" class="ssnav headerNav">GLOBAL MANAGEMENT</a>
                    <a href="/graduate/specializations/finance" class="ssnav headerNav">FINANCE</a>
                    <a href="/graduate/specializations/fraud-financial-crimes" class="ssnav headerNav">FRAUD AND FINANCIAL CRIMES</a>
                    <a href="/graduate/specializations/healthcare-administration" class="ssnav headerNav">HEALTHCARE ADMINISTRATION</a>
                    <a href="/graduate/specializations/human-resource-management" class="ssnav headerNav">HUMAN RESOURCE MANAGEMENT</a>
                    <a href="/graduate/specializations/information-technology" class="ssnav headerNav">INFORMATION TECHNOLOGY</a>
                </div>
                <div class="col col4">


                    <a href="/graduate/specializations/international-management" class="ssnav headerNav">INTERNATIONAL MANAGEMENT</a>
                    <a href="/graduate/specializations/math-k-12-educators" class="ssnav headerNav">MATH K-12 EDUCATORS</a>
                    <a href="/graduate/specializations/online-learning-innovation-and-design" class="ssnav headerNav">ONLINE LEARNING INNOVATION AND DESIGN</a>
                    <a href="/graduate/specializations/organizational-leadership-and-change-management" class="ssnav headerNav">ORGANIZATIONAL LEADERSHIP AND CHANGE MANAGEMENT</a>
                    <a href="/graduate/specializations/organizational-learning-and-performance" class="ssnav headerNav">ORGANIZATIONAL LEARNING AND PERFORMANCE</a>
                </div>
                <div class="col col5">

                    <a href="/graduate/specializations/population-health" class="ssnav headerNav">POPULATION HEALTH</a>
                    <a href="/graduate/specializations/project-management" class="ssnav headerNav">PROJECT MANAGEMENT</a>
                    <a href="/graduate/specializations/strategic-innovation-and-change-management" class="ssnav headerNav">STRATEGIC INNOVATION AND CHANGE MANAGEMENT</a>
                    <a href="/graduate/specializations" class="ssnav headerNav viewall">VIEW ALL SPECIALIZATIONS »</a>
                </div>
            </div>
            <div id="GR_k12educators" class="subsub">
                <a href="/graduate/k-12-educators" class="mainpage headerNav no_mobile">K-12 EDUCATORS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />GRADUATE</a>
                    <hr class="mobile_only">
                    <a href="/graduate/k-12-educators" class="mobile_only main">K-12 EDUCATORS</a>
                    <hr class="mobile_only">
                    <a href="/graduate/k-12-educators/teacher-ready" class="ssnav headerNav">TEACHER READY</a>
                    <a href="/graduate/k-12-educators/principal-licensure" class="ssnav headerNav">PRINCIPAL LICENSURE</a>
                    <a href="/graduate/k-12-educators/dual-enrollment-students" class="ssnav headerNav">DUAL ENROLLMENT FOR STUDENTS</a>
                    <a href="/graduate/k-12-educators/dual-enrollment-coursework-math" class="ssnav headerNav">DUAL ENROLLMENT COURSEWORK MATH</a>
                </div>
                <div class="col col3">
                    <a href="/graduate/k-12-educators/dual-enrollment-coursework-english" class="ssnav headerNav">DUAL ENROLLMENT COURSEWORK ENGLISH</a>
                    <a href="/graduate/k-12-educators/education-academy" class="ssnav headerNav">EDUCATION ACADEMY</a>
                    <a href="/graduate/k-12-educators/pebc-partnership" class="ssnav headerNav">PEBC PARTNERSHIP</a>
                </div>
            </div>
            <div id="GR_areasofstudy" class="subsub">
                <a href="/about/schools-and-programs/areas-study" class="mainpage headerNav no_mobile single">AREAS OF STUDY <span>Main Page &#187;</span></a>
            </div>
            <div id="GR_academiccatalog" class="subsub">
                <a href="/resources/academic-catalog" class="mainpage headerNav no_mobile single">ACADEMIC CATALOG <span>Main Page &#187;</span></a>
            </div>
            <div class="clr"></div>
        </div>

        <!-- COST -->
        <div id="CO" class="section"><!-- COST -->
            <div class="col col1">

                <a href="javascript:mainnav.back(2);" class="mobile_only back"><span>Back to</span><br />MAIN MENU</a>
                <hr class="mobile_only">
                <a href="/cost" class="mobile_only main">COST</a>
                <hr class="mobile_only">

                <a href="javascript:mainnav.getSub('CO_tuition')" class="snav active headerNav">TUITION</a>
                <a href="javascript:mainnav.getSub('CO_financialoptions')" class="snav active headerNav">FINANCIAL OPTIONS</a>
                <a href="javascript:mainnav.getSub('CO_discounts')" class="snav active headerNav">TUITION DISCOUNTS</a>
            </div>
            <div id="CO_tuition" class="subsub default">
                <a href="/cost/tuition" class="mainpage headerNav no_mobile">TUITION <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />COST</a>
                    <hr class="mobile_only">
                    <a href="/cost/tuition" class="mobile_only main">TUITION</a>
                    <hr class="mobile_only">

                    <a href="/cost/tuition/tuition-rates" class="ssnav headerNav">TUITION RATES</a>
                    <a href="/cost/tuition/tuition-guarantee" class="ssnav headerNav">TUITION GUARANTEE</a>
                    <a href="/cost/tuition/tuition-planning" class="ssnav headerNav">TUITION PLANNING</a>
                    <a href="/cost/tuition/net-price-calculator" class="ssnav headerNav">NET PRICE CALCULATOR</a>
                </div>
            </div>
            <div id="CO_financialoptions" class="subsub">
                <a href="/cost/financial-options" class="mainpage headerNav no_mobile">FINANCIAL OPTIONS <span>Main Page &#187;</span></a>
                <div class="col col3">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />COST</a>
                    <hr class="mobile_only">
                    <a href="/cost/financial-options" class="mobile_only main">FINANCIAL OPTIONS</a>
                    <hr class="mobile_only">

                    <a href="/cost/financial-options/financial-aid" class="ssnav headerNav">FINANCIAL AID</a>
                    <a href="/cost/financial-options/scholarships" class="ssnav headerNav">SCHOLARSHIPS</a>
                    <a href="/cost/financial-options/military-tuition-assistance" class="ssnav headerNav">MILITARY TUITION ASSISTANCE</a>
                    <a href="/cost/financial-options/employer-reimbursement" class="ssnav headerNav">EMPLOYER REIMBURSEMENT</a>
                    <a href="/cost/financial-options/paying-your-own" class="ssnav headerNav">PAYING ON YOUR OWN</a>
                </div>
            </div>
            <div id="CO_discounts" class="subsub">
                <a href="/cost/tuition-discounts" class="mainpage headerNav no_mobile">TUITION DISCOUNTS <span>Main Page &#187;</span></a>
                <div class="col col3">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />COST</a>
                    <hr class="mobile_only">
                    <a href="/cost/tuition-discounts" class="mobile_only main">TUITION DISCOUNTS</a>
                    <hr class="mobile_only">

                    <a href="/cost/tuition-discounts/military-benefits" class="ssnav headerNav">MILITARY BENEFITS</a>
                    <a href="/alumni" class="ssnav headerNav">ALUMNI DISCOUNT</a>
                    <a href="/cost/tuition-discounts/csu-global-employer-partners" class="ssnav headerNav">EMPLOYER PARTNERS</a>
                    <a href="/cost/tuition-discounts/association-partners" class="ssnav headerNav">ASSOCIATION PARTNERS</a>
                </div>
            </div>
            <div class="clr"></div>
        </div>

        <!-- ADMISSIONS -->
        <div id="AM" class="section">
            <div class="col col1">

                <a href="javascript:mainnav.back(2);" class="mobile_only back"><span>Back to</span><br />MAIN MENU</a>
                <hr class="mobile_only">
                <a href="/admissions" class="mobile_only main">ADMISSIONS</a>
                <hr class="mobile_only">

                <a href="javascript:mainnav.getSub('AM_admissionsprocess')" class="snav active headerNav">ADMISSIONS PROCESS</a>
                <a href="javascript:mainnav.getSub('AM_transferinfo')" class="snav active headerNav">TRANSFER INFO</a>
                <!--<a href="/student-application" class="snav active headerNav" target="_blank">APPLY NOW</a>-->
                <a href="/student-application" class="snav active headerNav single" target="_blank">APPLY NOW</a>

            </div>
            <div id="AM_admissionsprocess" class="subsub">
                <a href="/admissions/admissions-process" class="mainpage headerNav no_mobile">ADMISSIONS PROCESS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />ADMISSIONS</a>
                    <hr class="mobile_only">
                    <a href="/admissions/admissions-process" class="mobile_only main">ADMISSIONS PROCESS</a>
                    <hr class="mobile_only">

                    <a href="/admissions/admissions-process/admissions-requirements" class="ssnav headerNav">ADMISSIONS REQUIREMENTS</a>
                    <a href="/admissions/admissions-process/submitting-your-transcripts" class="ssnav headerNav">SUBMITTING YOUR TRANSCRIPTS</a>
                    <a href="/admissions/admissions-process/transfer-estimates" class="ssnav headerNav">TRANSFER ESTIMATES</a>
                    <a href="/admissions/admissions-process/technology-requirements" class="ssnav headerNav">TECHNOLOGY REQUIREMENTS</a>
                    <a href="/admissions/admissions-process/freshmen-admissions" class="ssnav headerNav">FRESHMEN ADMISSIONS</a>
                </div>
            </div>
            <div id="AM_transferinfo" class="subsub">
                <a href="/admissions/transfer-info" class="mainpage headerNav no_mobile">TRANSFER INFO <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />ADMISSIONS</a>
                    <hr class="mobile_only">
                    <a href="/admissions/transfer-info" class="mobile_only main">TRANSFER INFO</a>
                    <hr class="mobile_only">

                    <a href="/admissions/transfer-info/community-college-transfer" class="ssnav headerNav">COMMUNITY COLLEGE TRANSFER</a>
                    <a href="/admissions/transfer-info/transfer-evaluation-system" class="ssnav headerNav">TRANSFER EVALUATION SYSTEM</a>
                    <a href="/admissions/transfer-info/military-credit" class="ssnav headerNav">MILITARY CREDIT</a>
                </div>
                <div class="col col3">
                </div>
            </div>
            <div class="clr"></div>
        </div>

        <!-- RESOURCES -->
        <div id="RS" class="section"><!-- RESOURCES -->
            <div class="col col1">

                <a href="javascript:mainnav.back(2);" class="mobile_only back"><span>Back to</span><br />MAIN MENU</a>
                <hr class="mobile_only">
                <a href="/resources" class="mobile_only main">RESOURCES</a>
                <hr class="mobile_only">

                <a href="javascript:mainnav.getSub('RS_academicresources')" class="snav headerNav">ACADEMIC RESOURCES</a>
                <a href="javascript:mainnav.getSub('RS_onlineeducation')" class="snav headerNav">ONLINE EDUCATION</a>
                <a href="javascript:mainnav.getSub('RS_faq')" class="snav headerNav">FREQUENTLY ASKED QUESTIONS (FAQ)</a>
                <a href="javascript:mainnav.getSub('RS_studentservices')" class="snav headerNav">STUDENT SERVICES</a>
                <a href="/military" class="snav headerNav single">MILITARY</a>
                <a href="/alumni" class="snav headerNav single">ALUMNI</a>
                <a href="/resources/commencement/" class="snav headerNav single">COMMENCEMENT</a>
                <a href="http://store.csuglobal.edu/" class="snav headerNav single" target="_blank">SCHOOL STORE</a>
            </div>
            <div id="RS_academicresources" class="subsub">
                <!-- <a href="/resources/online-education" class="mainpage headerNav no_mobile">ONLINE EDUCATION <span>Main Page &#187;</span></a> -->
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />RESOURCES</a>
                    <hr class="mobile_only">
                    <a href="/resources/academic-catalog" class="ssnav headerNav">ACADEMIC CATALOG</a>
                    <a href="/resources/academic-calendar" class="ssnav headerNav">ACADEMIC CALENDAR</a>
                    <a href="/resources/course-availability-schedule" class="ssnav headerNav">COURSE AVAILABILITY SCHEDULE</a>
                </div>
            </div>
            <div id="RS_onlineeducation" class="subsub">
                <a href="/resources/online-education" class="mainpage headerNav no_mobile">ONLINE EDUCATION <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />RESOURCES</a>
                    <hr class="mobile_only">
                    <a href="/resources/online-education" class="mobile_only main">ONLINE EDUCATION</a>
                    <hr class="mobile_only">
                    <a href="/direct-path-education" class="ssnav headerNav">DIRECT PATH EDUCATION</a>
                    <a href="/resources/online-education/how-does-online-education-work" class="ssnav headerNav">HOW DOES ONLINE EDUCATION WORK?</a>
                    <a href="/resources/online-education/how-to-be-a-successful-online-student" class="ssnav headerNav">HOW TO BE A SUCCESSFUL ONLINE STUDENT</a>
                    <a href="/resources/online-education/3-p-model" class="ssnav headerNav">THE 3 P MODEL</a>

                </div>
                <div class="col col3">
                    <a href="/resources/online-education/sample-coursework" class="ssnav headerNav">SAMPLE COURSEWORK</a>
                    <a href="/resources/online-education/sample-schedule" class="ssnav headerNav">SAMPLE SCHEDULE</a>
                    <a href="/resources/online-education/data-analytics-mini-course" class="ssnav headerNav">DATA ANALYTICS MINI COURSE</a>
                    <a href="/resources/online-education/online-degrees-students-who-need-flexibility" class="ssnav headerNav">ONLINE DEGREES FOR STUDENTS WHO NEED FLEXIBILITY</a>
                </div>
            </div>
            <div id="RS_faq" class="subsub">
                <a href="/resources/frequently-asked-questions-faq" class="mainpage headerNav no_mobile">FREQUENTLY ASKED QUESTIONS (FAQ) <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />RESOURCES</a>
                    <hr class="mobile_only">
                    <a href="/resources/frequently-asked-questions-faq" class="mobile_only main">FREQUENTLY ASKED QUESTIONS (FAQ)</a>
                    <hr class="mobile_only">

                    <a href="/resources/frequently-asked-questions-faq/is-college-worth-it" class="ssnav headerNav">IS COLLEGE WORTH IT?</a>
                    <a href="/resources/frequently-asked-questions-faq/what-major-should-i-choose" class="ssnav headerNav">WHAT MAJOR SHOULD I CHOOSE?</a>
                    <a href="/resources/frequently-asked-questions-faq/how-much-does-college-cost" class="ssnav headerNav">HOW MUCH DOES COLLEGE COST?</a>
                    <a href="/resources/frequently-asked-questions-faq/what-does-regional-accreditation-mean" class="ssnav headerNav">WHAT DOES REGIONAL ACCREDITATION MEAN?</a>
                </div>
                <div class="col col3">
                    <a href="/resources/frequently-asked-questions-faq/what-should-i-know-about-online-degree-programs" class="ssnav headerNav">WHAT SHOULD I KNOW ABOUT ONLINE DEGREE PROGRAMS?</a>
                    <a href="/resources/frequently-asked-questions-faq/how-do-i-maintain-school-life-balance" class="ssnav headerNav">HOW DO I MAINTAIN A SCHOOL/LIFE BALANCE?</a>
                </div>
            </div>
            <div id="RS_studentservices" class="subsub">
                <a href="/resources/student-services" class="mainpage headerNav no_mobile">STUDENT SERVICES <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />RESOURCES</a>
                    <hr class="mobile_only">
                    <a href="/resources/student-services" class="mobile_only main">STUDENT SERVICES</a>
                    <hr class="mobile_only">

                    <a href="/resources/student-services/tutoring" class="ssnav headerNav">TUTORING</a>
                    <a href="/resources/student-services/library" class="ssnav headerNav">LIBRARY</a>
                    <a href="/resources/student-services/writing-center" class="ssnav headerNav">WRITING CENTER</a>
                    <a href="/resources/student-services/technical-support" class="ssnav headerNav">TECHNICAL SUPPORT</a>
                    <a href="/resources/student-services/career-center" class="ssnav headerNav">CAREER CENTER</a>
                    <a href="/resources/student-services/mobile-app" class="ssnav headerNav">MOBILE APP</a>
                </div>
                <div class="col col3">
                    <a href="/resources/student-services/disability-services" class="ssnav headerNav">DISABILITY SERVICES</a>
                    <a href="/resources/student-services/honors-societies" class="ssnav headerNav">HONORS SOCIETIES</a>
                    <a href="/resources/student-services/ordering-transcripts" class="ssnav headerNav">ORDERING TRANSCRIPTS</a>
                    <a href="/resources/student-services/student-and-alumni-discounts" class="ssnav headerNav">STUDENT AND ALUMNI DISCOUNTS</a>
                    <a href="/resources/student-services/student-success" class="ssnav headerNav">STUDENT SUCCESS SERVICES</a>
                </div>
            </div>
            <div id="RS_military" class="subsub">
                <a href="/military" class="mainpage headerNav">MILITARY <span>Main Page &#187;</span></a>
            </div>

            <div id="RS_alumni" class="subsub">
                <a href="/alumni" class="mainpage headerNav">ALUMNI <span>Main Page &#187;</span></a>
            </div>

            <div id="RS_commencement" class="subsub">
                <a href="/site/commencement/" class="mainpage headerNav">COMMENCEMENT <span>Main Page &#187;</span></a>
            </div>
            <div id="RS_schoolstore" class="subsub">
                <a href="http://store.csuglobal.edu" class="mainpage headerNav" target="_blank" >SCHOOL STORE <span>Main Page &#187;</span></a>
            </div>
            <div class="clr"></div>
        </div>

        <!-- ABOUT -->
        <div id="AB" class="section">
            <div class="col col1">

                <a href="javascript:mainnav.back(2);" class="mobile_only back"><span>Back to</span><br />MAIN MENU</a>
                <hr class="mobile_only">
                <a href="/about" class="mobile_only main">ABOUT</a>
                <hr class="mobile_only">

                <a href="javascript:mainnav.getSub('AB_ouruniversity')" class="snav headerNav">OUR UNIVERSITY</a>
                <a href="javascript:mainnav.getSub('AB_csuglobalvalue')" class="snav headerNav">CSU GLOBAL VALUE</a>
                <a href="javascript:mainnav.getSub('AB_news')" class="snav headerNav">NEWS</a>
                <a href="/blog/" class="snav headerNav single">BLOG</a>
                <a href="javascript:mainnav.getSub('AB_schoolsandprograms')" class="snav headerNav">SCHOOLS AND PROGRAMS</a>
                <a href="javascript:mainnav.getSub('AB_corporateeducationcommunity')" class="snav headerNav">PARTNERSHIPS</a>
                <a href="/about/contact-us" class="snav headerNav single">CONTACT US</a>
                <a href="javascript:mainnav.getSub('AB_careers')" class="snav headerNav">CAREERS</a>
            </div>
            <div id="AB_ouruniversity" class="subsub">
                <a href="/about/our-university" class="mainpage headerNav no_mobile">OUR UNIVERSITY <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />ABOUT</a>
                    <hr class="mobile_only">
                    <a href="/about/our-university" class="mobile_only main">OUR UNIVERSITY</a>
                    <hr class="mobile_only">

                    <a href="/about/our-university/why-csu-global" class="ssnav headerNav">WHY CSU GLOBAL?</a>
                    <a href="/about/our-university/our-mission-vision-and-core-values" class="ssnav headerNav">OUR MISSION, VISION, AND CORE VALUES</a>
                    <a href="/about/our-university/csu-system" class="ssnav headerNav">CSU SYSTEM</a>
                    <a href="/about/our-university/ccc-system" class="ssnav headerNav">COMMITMENT TO COLORADO</a>
                    <a href="/about/our-university/our-faculty" class="ssnav headerNav">OUR FACULTY</a>
                    <a href="/about/our-university/our-history" class="ssnav headerNav">OUR HISTORY</a>
                </div>
                <div class="col col3">
                    <a href="/about/our-university/association-memberships" class="ssnav headerNav">ASSOCIATION MEMBERSHIPS</a>
                    <a href="/about/our-university/accreditation" class="ssnav headerNav">ACCREDITATION</a>
                    <a href="/consumer-information" class="ssnav headerNav">CONSUMER INFORMATION</a>
                    <a href="/about/our-university/spread-word" class="ssnav headerNav">SPREAD THE WORD</a>
                </div>
            </div>
            <div id="AB_csuglobalvalue" class="subsub default">
                <a href="/about/csu-global-value" class="mainpage headerNav no_mobile">CSU GLOBAL VALUE <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />ABOUT</a>
                    <hr class="mobile_only">
                    <a href="/about/csu-global-value" class="mobile_only main">CSU GLOBAL VALUE</a>
                    <hr class="mobile_only">

                    <a href="/about/csu-global-value/academic-learning" class="ssnav headerNav">ACADEMIC LEARNING</a>
                    <a href="/about/csu-global-value/professional-success" class="ssnav headerNav">PROFESSIONAL SUCCESS</a>
                    <a href="/about/csu-global-value/satisfaction-and-reputation" class="ssnav headerNav">SATISFACTION AND REPUTATION</a>
                    <a href="/about/csu-global-value/industry-alignments" class="ssnav headerNav">INDUSTRY ALIGNMENTS</a>
                </div>
            </div>
            <div id="AB_news" class="subsub default">
                <a href="/about/news" class="mainpage headerNav no_mobile">NEWS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />ABOUT</a>
                    <hr class="mobile_only">
                    <a href="/about/news" class="mobile_only main">NEWS</a>
                    <hr class="mobile_only">

                    <a href="/about/news/whats-new-u" class="ssnav headerNav">WHAT'S NEW AT THE U</a>
                    <a href="/about/news/events" class="ssnav headerNav">EVENTS</a>
                    <a href="/about/news/press-room" class="ssnav headerNav">PRESS ROOM</a>
                    <a href="/about/news/press-releases" class="ssnav headerNav">PRESS RELEASES</a>
                </div>
            </div>
            <div id="AB_blog" class="subsub default">
                <a href="/blog/" class="mainpage headerNav">BLOG <span>Main Page &#187;</span></a>
            </div>
            <div id="AB_schoolsandprograms" class="subsub default">
                <a href="/about/schools-and-programs" class="mainpage headerNav no_mobile">SCHOOL PROGRAMS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />ABOUT</a>
                    <hr class="mobile_only">
                    <a href="/about/schools-and-programs" class="mobile_only main">SCHOOL PROGRAMS</a>
                    <hr class="mobile_only">

                    <a href="/about/schools-and-programs/areas-study" class="ssnav headerNav">AREAS OF STUDY</a>
                    <a href="/about/schools-and-programs/school-professional-studies" class="ssnav headerNav">SCHOOL OF PROFESSIONAL STUDIES</a>
                    <a href="/about/schools-and-programs/school-management-and-innovation" class="ssnav headerNav">SCHOOL OF MANAGEMENT AND INNOVATION</a>
                </div>
            </div>
            <div id="AB_corporateeducationcommunity" class="subsub default">
                <a href="/about/partnerships" class="mainpage headerNav no_mobile">PARTNERSHIPS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />ABOUT</a>
                    <hr class="mobile_only">
                    <a href="/about/partnerships" class="mobile_only main">PARTNERSHIPS</a>
                    <hr class="mobile_only">

                    <a href="/about/partnerships/institutional-development-solutions" class="ssnav headerNav">EDUCATIONAL INSTITUTIONS</a>
                    <a href="/cost/tuition-discounts/csu-global-employer-partners" class="ssnav headerNav">EMPLOYER PARTNERS</a>
                    <a href="/amazon" class="ssnav headerNav">AMAZON CAREER CHOICE</a>
                    <a href="/about/partnerships/aurora-partnerships" class="ssnav headerNav">AURORA PARTNERSHIPS</a>
                </div>
                <div class="col col3">
                    <a href="/about/partnerships/find-intern" class="ssnav headerNav">FIND AN INTERN</a>
                    <a href="/about/partnerships/sas-joint-certificates" class="ssnav headerNav">SAS JOINT CERTIFICATES</a>
                </div>
            </div>
            <div id="AB_contactus" class="subsub default">
                <a href="/about/contact-us" class="mainpage headerNav">CONTACT US <span>Main Page &#187;</span></a>
            </div>
            <div id="AB_careers" class="subsub default">
                <a href="/about/careers" class="mainpage headerNav no_mobile">CAREERS <span>Main Page &#187;</span></a>
                <div class="col col2">

                    <a href="javascript:mainnav.back(3);" class="mobile_only back"><span>Back to</span><br />ABOUT</a>
                    <hr class="mobile_only">
                    <a href="/about/careers" class="mobile_only main">CAREERS</a>
                    <hr class="mobile_only">

                    <a href="https://staff-csuglobal.icims.com" target="_blank" class="ssnav headerNav">STAFF JOBS</a>
                    <a href="https://faculty-csuglobal.icims.com" target="_blank" class="ssnav headerNav">FACULTY JOBS</a>
                    <a href="/about/careers/faculty-application-process" class="ssnav headerNav">FACULTY APPLICATION PROCESS</a>
                    <a href="/about/careers/faculty-expectations" class="ssnav headerNav">FACULTY EXPECTATIONS</a>
                    <a href="/about/careers/equal-opportunity" class="ssnav headerNav">EQUAL OPPORTUNITY</a>
                </div>
            </div>
            <div class="clr"></div>
        </div>

    </div>
</div>