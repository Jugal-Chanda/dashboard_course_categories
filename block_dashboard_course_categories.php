<?php
class block_dashboard_course_categories extends block_base
{
    public function init()
    {
        $this->title = get_string('dashboard_course_categories', 'block_dashboard_course_categories');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    public function get_content()
    {
        global $CFG, $USER, $DB, $OUTPUT, $PAGE,$wwwroot;
        if ($this->content !== null) {
            return $this->content;
        }
        // var_dump();
        // die();
        $categories = $DB->get_records('course_categories');
        $this->content         =  new stdClass;
        $this->content->text = '<div class="row no-gutters">';
        $image = $CFG->wwwroot.'/theme/space/pix/default_course.jpg';
        foreach ($categories as $key => $category) {

            $this->content->text .= '<div class="card c-course-box col-md-4 p-2 mb-2" data-courseid="2" data-type="1">
            <!-- div2 -->
            <div class="mx-1">
                <div class="c-course-content row no-gutters">
                    <a class="col-12 align-self-start p-0" href="http://localhost/moodle/course/view.php?id=2">
                        <div class="card-img-top myoverviewimg courseimage" style="background-image: url('.$image.');"></div>
                    </a>
                    <div class="c-course-box-content w-100">
                        <h4 class="course-box-title"><span class="course-box-title-txt" title="Course 1"><a class="" href="#">' . $category->name . '</a></span></h4>
                        <div class="course-box-content-desc os-host os-theme-dark os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition">
                            <div class="os-resize-observer-host observed">
                                <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                            </div>
                            <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                                <div class="os-resize-observer"></div>
                            </div>
                            <div class="os-content-glue" style="margin: 0px; height: 0px; width: 361px;"></div>
                            <div class="os-padding">
                                <div class="os-viewport os-viewport-native-scrollbars-invisible">
                                    <div class="os-content" style="padding: 0px; height: auto; width: 100%;"></div>
                                </div>
                            </div>
                            <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable">
                                <div class="os-scrollbar-track os-scrollbar-track-off">
                                    <div class="os-scrollbar-handle" style="transform: translate(0px, 0px); width: 100%;"></div>
                                </div>
                            </div>
                            <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable">
                                <div class="os-scrollbar-track os-scrollbar-track-off">
                                    <div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div>
                                </div>
                            </div>
                            <div class="os-scrollbar-corner"></div>
                        </div>
                    </div>
                    <div class="courses-view-course-item-footer col-12 align-self-end">
                        <div class="course--btn"><a class="btn btn-primary" href="'.$CFG->wwwroot.'/course/index.php?categoryid='.$category->id.'">All Courses</a></div>
                    </div>
                </div>
            </div>
        </div>';
        }
        // die();
        // var_dump($this->content->text);
        // die();
        $this->content->text .= '</div>';
        $courserenderer = $PAGE->get_renderer('core', 'course');

        // $this->content->footer = $courserenderer->add_new_course_button();

        return $this->content;
    }
}
