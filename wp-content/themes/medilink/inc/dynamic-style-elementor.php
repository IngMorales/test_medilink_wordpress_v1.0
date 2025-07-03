<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

namespace radiustheme\Medilink;

/*-------------------------------------
INDEX
=======================================
#. EL: Section Title
#. EL: About Area
#. EL: Owl Nav
#. EL: Owl Dots
#. EL: Post Slider
#. EL: Doctors Area
#. EL: Schedule
#. EL: Gallrey Tab
#. EL: Gallrey 1
#. EL: Gallrey 2
#. EL: Gallrey 3
#. EL: Call To Action
#. EL: Counter
#. EL: Info Box
#. EL: Text With Title
#. EL: Navigation Menu
#. EL: Contact
#. EL: Slider
#. EL: Price table
#. EL: Departments
#. EL: Services

-------------------------------------*/

$medilink 			= MEDILINK_THEME_PREFIX_VAR;
$primary_color    	= apply_filters( "{$medilink}_primary_color", RDTheme::$options['primary_color'] ); // #ffbe00
$secondery_color  	= apply_filters( "{$medilink}_secondery_color", RDTheme::$options['secondery_color'] ); // #d49f05
$primary_txt_color  = apply_filters( "{$medilink}_primary_txt_color", RDTheme::$options['primary_txt_color'] ); 
$primary_rgb      	= Helper::hex2rgb( $primary_color ); // 255,190,0
$secondery_rgb      = Helper::hex2rgb( $secondery_color ); // 255,190,0
?>

<?php
/*-------------------------------------
#. EL: Section Title
---------------------------------------*/
?>
.elementor-2410 .elementor-element.elementor-element-79b5630 .section-heading::after {
	background-color: <?php echo esc_html( $primary_color ); ?>;	
}
.rt-el-paragraph-title .rtin-title span {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.elementor-8 .elementor-element.elementor-element-2da73e0 .rtin-subtitle{
	color: <?php echo esc_html( $primary_color ); ?>;
}
.elementor-8 .elementor-element.elementor-element-2da73e0 .section-heading::after {
	background: <?php echo esc_html( $primary_color ); ?>;
}
.heading-layout1.theme4.style1::after,
.heading-layout1.theme2.style1::after,
.heading-layout1.theme3.style1::after {	
	background-color: <?php echo esc_html( $primary_color ); ?>;	
}
.heading-layout1.theme4.style1 p,
.heading-layout1.theme2.style1 p,
.heading-layout1.theme3.style1 p{
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-title.style2 .rtin-title:after,
.rt-el-twt-3.rtin-dark .rtin-title:after{
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.heading-layout1::after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: About Area
---------------------------------------*/
?>
.rt-el-info-box.rtin-style2:hover {
	box-shadow: 0 10px 55px 5px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.30);
}
.about-box-layout2 ul li a::after {	
	background-color: <?php echo esc_html( $secondery_color ); ?>;	
}
.about-box-layout2 ul li a {	
	background: -webkit-gradient(linear, left top, right top, from(<?php echo esc_html( $primary_color ); ?>), to(<?php echo esc_html( $primary_color ); ?>));
	background: -webkit-linear-gradient(left, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $primary_color ); ?>);
	background: -o-linear-gradient(left, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $primary_color ); ?>);
	background: linear-gradient(to right, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $primary_color ); ?>);
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
.about-box-layout2 ul li a::before {	
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.call-to-action-box-layout3 .single-item a::after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.call-to-action-box-layout3 .single-item a::after {
	background-color: <?php echo esc_html( $secondery_color ); ?>;	
}
.call-to-action-box-layout3 .single-item a {	
	background: -webkit-gradient(linear, left top, right top, from(<?php echo esc_html( $primary_color ); ?>), to(<?php echo esc_html( $primary_color ); ?>));
	background: -webkit-linear-gradient(left, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $primary_color ); ?>);
	background: -o-linear-gradient(left, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $primary_color ); ?>);
	background: linear-gradient(to right, <?php echo esc_html( $primary_color ); ?>, <?php echo esc_html( $primary_color ); ?>);
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
.call-to-action-box-layout3 .single-item a i::before {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.rt-el-nav-menu.widget-about-info ul li a:hover::before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-nav-menu.widget-about-info ul li a:hover::before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-nav-menu.widget-about-info ul li a:hover::after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.widget-ad-area .item-btn i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.widget-ad-area .item-btn:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.widget-ad-area .item-btn:hover i {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.about-info-list .about-info li a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.about-info-list .about-info li::after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
	-webkit-box-shadow: 0px 2px 15px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);
	-moz-box-shadow: 0px 2px 15px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);
	box-shadow: 0px 2px 15px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);
}
.rt-el-nav-menu.widget-about-info ul li a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.about-info-list ul.list-info li::after {
	color: <?php echo esc_html( $primary_color ); ?>;
}



<?php
/*-------------------------------------
#. EL: Owl Nav
---------------------------------------*/
?>

.site-wrp .nav-control-layout2.owl-theme .owl-nav > div {
	color: <?php echo esc_html( $primary_color ); ?>
}
.site-wrp .nav-control-layout3.owl-theme .owl-nav .owl-prev:hover {
	background: <?php echo esc_html( $primary_color ); ?> !important;	
}
.site-wrp .nav-control-layout3.owl-theme .owl-nav .owl-next:hover {
	background: <?php echo esc_html( $primary_color ); ?> !important;	
}
.dot-control-layout1.owl-theme .owl-dots .owl-dot span {
	border: 2px solid <?php echo esc_html( $primary_color ); ?>;	
}
.dot-control-layout1.owl-theme .owl-dots .owl-dot.active span {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.dot-control-layout1.owl-theme .owl-dots .owl-dot span:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.site-wrp .nav-control-layout-top2 .owl-nav > div {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.site-wrp .nav-control-layout-top .owl-nav .owl-prev:hover,
.site-wrp .nav-control-layout-top .owl-nav .owl-next:hover {
	box-shadow: 0px 4px 20px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);
}
.rt-owl-nav .owl-theme .owl-nav > div,
.site-wrp .nav-control-layout-top .owl-nav > div {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-owl-nav .owl-theme .owl-nav > div {
	border-color: <?php echo esc_html( $primary_color ); ?>;
	
}
.rt-owl-nav .owl-theme .owl-nav > div:hover{	
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.site-wrp .nav-control-layout-top .owl-nav .owl-prev,
.site-wrp .nav-control-layout-top .owl-nav .owl-next {	
	color: <?php echo esc_html( $primary_color ); ?>;
}
.site-wrp .nav-control-layout-top .owl-nav .owl-prev:hover,
.site-wrp .nav-control-layout-top .owl-nav .owl-next:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.site-wrp .nav-control-layout-top .owl-nav .owl-prev:hover i, 
.site-wrp .nav-control-layout-top .owl-nav .owl-next:hover i {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
<?php
/*-------------------------------------
#. EL: Owl Dots
---------------------------------------*/
?>
.rt-owl-dot .owl-theme .owl-dots .owl-dot.active span,
.rt-owl-dot .owl-theme .owl-dots .owl-dot:hover span {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Post Slider
---------------------------------------*/
?>
.rt-el-post-slider .rtin-item .rtin-content-area .date-time {
		color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-post-slider .rtin-item .rtin-content-area .rtin-header .rtin-title a:hover,
.rt-el-post-slider .rtin-item .rtin-content-area .read-more-btn i,
.rt-el-post-slider .rtin-item .rtin-content-area .read-more-btn:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Doctors Area
---------------------------------------*/
?>
.elementor-2252 .elementor-element.elementor-element-4cba7955 .section-heading::after {
		background-color: <?php echo esc_html( $primary_color  ); ?>;
}
.rt-el-info-box.rtin-style4:hover .rtin-icon {
	background-color: <?php echo esc_html( $primary_color  ); ?>;
}
.team-box-layout41 .item-img::after {
	background-color: rgba(<?php echo esc_html( $primary_rgb  ); ?>, 0.90);
}
.team-box-layout41 .item-content .item-title a:hover{
	color: <?php echo esc_html( $primary_color ); ?>;
}
.team-box-layout41 .item-social li a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.team-box-layout42 .item-mid .item-content .item-content-mid .item-social li a,
.team-box-layout42 .item-mid .item-content .item-content-mid p,
.team-box-layout42 .item-mid .item-content .item-content-mid .item-title a {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}

.team-box-layout2 .item-content::after {
		background-color: <?php echo esc_html( $primary_color ); ?>;
}
.team-search-box .item-btn:hover {
	background-color: <?php echo esc_html( $secondery_color ); ?>;
}
.select2-container--classic .select2-selection--single .select2-selection__arrow b {
	border-color: <?php echo esc_html( $primary_txt_color ); ?> transparent transparent transparent;
}
.select2-container--classic.select2-container--open .select2-selection--single .select2-selection__arrow {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.select2-container--classic .select2-results__option--highlighted[aria-selected] {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.team-search-box .item-btn {
	border-color: <?php echo esc_html( $primary_color ); ?>;
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}

.select2-container--classic .select2-selection--single .select2-selection__arrow {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.departments-box-layout4:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
.departments-box-layout4:hover .box-content .item-title a {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.departments-box-layout5 .item-img::before {	
	background: -webkit-linear-gradient(to top, <?php echo esc_html( $primary_color ); ?>, transparent);
	background: -o-linear-gradient(to top, <?php echo esc_html( $primary_color ); ?>, transparent);
	background: -moz-linear-gradient(to top, <?php echo esc_html( $primary_color ); ?>, transparent);
	background: linear-gradient(to top, <?php echo esc_html( $primary_color ); ?>, transparent);	
}
.departments-box-layout5:hover .item-img::before {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.departments-box-layout1 .item-content .item-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.team-box-layout1 .title-bar::after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.team-box-layout1 .item-schedule .item-btn {	
	border-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_color ); ?>;	
}
.team-box-layout1 .item-schedule .item-btn:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;	
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.team-box-layout5 .item-content .item-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;	
}
.team-box-layout5 .item-content .item-degree {
	color: <?php echo esc_html( $primary_color ); ?>;
	
}
.team-box-layout5 .item-content ul.item-btns li a.item-btn.btn-ghost {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.team-box-layout5 .item-content ul.item-btns li a.item-btn.btn-ghost:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.team-box-layout5 .item-content ul.item-btns li a.item-btn.btn-fill {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
	background-color: <?php echo esc_html( $primary_color ); ?>;
	-webkit-box-shadow: 0px 1px 10px 0px rgba(<?php echo esc_html( $primary_rgb  ); ?>, 0.75);
	-moz-box-shadow: 0px 1px 10px 0px rgba(<?php echo esc_html( $primary_rgb  ); ?>, 0.75);
	box-shadow: 0px 1px 10px 0px rgba(<?php echo esc_html( $primary_rgb  ); ?>, 0.75);
}
.team-box-layout5 .item-content ul.item-btns li a.item-btn.btn-fill:hover {	
	color: <?php echo esc_html( $primary_color ); ?>;	
}
.team-box-layout5 .item-content ul.item-btns li a.item-btn {	
	border-color: <?php echo esc_html( $primary_color ); ?>;	
}

.team-box-layout1 .item-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}






.title-bar:before {	
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

.departments-box-layout2 .item-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
	
}
.departments-box-layout2:hover .item-btn i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.departments-box-layout2:hover .item-btn:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.features-box-layout1 .list-info.theme2 li::before {	
	-webkit-box-shadow: 0px 5px 6px 0px <?php echo esc_html( $primary_color ); ?>;
	-moz-box-shadow: 0px 5px 6px 0px <?php echo esc_html( $primary_color ); ?>;
	box-shadow: 0px 5px 6px 0px <?php echo esc_html( $primary_color ); ?>;
}
.bg-primary .features-box-layout1 .list-info.theme2 li a,
.bg-primary .features-box-layout1 .list-info.theme2 li {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.elementor-progress-wrapper .elementor-progress-bar {
	background-color: <?php echo esc_html( $primary_color ); ?>  !important;
	color: <?php echo esc_html( $primary_txt_color ); ?> !important;
}
.team-box-layout2 .item-content .item-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.team-box-layout2 .item-schedule .item-btn {	
	border-color:  <?php echo esc_html( $primary_color ); ?>;
}
.team-box-layout2 .item-schedule .item-btn:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;	

}
.team-box-layout2:hover .item-schedule .item-btn {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.team-box-layout2 .item-img::after {	
	background-color: rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.9);	
}
.team-box-layout2 .item-img .item-icon li a {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
<?php
/*-------------------------------------
#. EL: Schedule
---------------------------------------*/
?>
.class-schedule-wrap1 table tbody tr td .schedule-item-wrapper .media {	
	box-shadow: 0px 4px 20px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.9);
}
.class-schedule-wrap1.layout-2 table tbody tr td .schedule-item-wrapper .item-ctg {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.class-schedule-wrap1.layout-2 table tbody tr td .schedule-item-wrapper .item-ctg {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.class-schedule-wrap1.layout-2 table tbody tr td .schedule-item-wrapper .media .media-body .item-btn {	
	border-color: <?php echo esc_html( $primary_color ); ?>;
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}

.class-schedule-wrap1.layout-2 table thead tr td {	
	background-color: <?php echo esc_html( $primary_color ); ?>;	
}
.class-schedule-wrap1.layout-2 table thead tr td .schedule-day-heading {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}

.class-schedule-wrap1.layout-2 table tbody tr td .schedule-item-wrapper .media .media-body .item-btn:hover {
	color: <?php echo esc_html( $primary_color ); ?>;	
}

.class-schedule-wrap1 table tbody tr td .schedule-item-wrapper .item-ctg {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.class-schedule-wrap1 table tbody tr td .schedule-item-wrapper .item-ctg {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.class-schedule-wrap1 table tbody tr td .schedule-item-wrapper .media .media-body .item-btn {	
	border-color: <?php echo esc_html( $primary_color ); ?>;
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}


.class-schedule-wrap1 table thead tr td .schedule-day-heading {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}

.class-schedule-wrap1 table tbody tr td .schedule-item-wrapper .media .media-body .item-btn:hover {
	color: <?php echo esc_html( $primary_color ); ?>;	
}

 
<?php
/*-------------------------------------
#. EL: Gallrey Tab
---------------------------------------*/
?>
.rt-isotope-wrapper .isotop-btn .current {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.rt-isotope-wrapper .isotop-btn a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.isotop-btn .current,
.rt-el-gallrey-tab .current {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.isotop-btn a:hover,
.rt-el-gallrey-tab a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.rt-el-gallrey-tab a {
	border: 1px solid <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Gallrey 1
---------------------------------------*/
?>
.gallery-box-layout1::after {
	background-color: rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.9);
}

<?php
/*-------------------------------------
#. EL: Gallrey 2
---------------------------------------*/
?>
.rt-el-gallrey-2 .rtin-item:before {
	background-image: linear-gradient(transparent, <?php echo esc_html( $primary_color ); ?>), linear-gradient(transparent, <?php echo esc_html( $primary_color ); ?>);
}
.rt-el-gallrey-2 .rtin-item .rtin-icon:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}

<?php

/*-------------------------------------
#. EL: Gallrey 3
---------------------------------------*/
?>
.rt-el-gallrey-3 .rtin-item:before {
	background-color: rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.8);
}
.rt-el-gallrey-3 .rtin-item .rtin-content .rtin-icon {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-services-box.rtin-style3 .rtin-content .rtin-title:after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.services-single .rtin-heading:after,
.rt-el-title.style3 .rtin-title:after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.widget .category-type ul li a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;	
}

<?php
/*-------------------------------------
#. EL: Call To Action
---------------------------------------*/
?>
.call-to-action-box-layout4 .call-to-action-btn .item-btn:hover {	
	box-shadow: 0 10px 55px 5px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.3);
}
.call-to-action-box-layout2 .item-btn:hover {
	background-color: <?php echo esc_html( $primary_txt_color ); ?>;
	color: <?php echo esc_html( $primary_color ); ?>;
}
.call-to-action-box-layout2 .item-btn {
	border-color: <?php echo esc_html( $primary_txt_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
.call-to-action-box-layout2 h2 {	
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
.call-to-action-box-layout2 .item-btn:hover {	
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-cta-1 {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Counter
---------------------------------------*/
?>
.progress-box-layout1 .inner-item .item-content .counting-text::after{	
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Info Box
---------------------------------------*/
?>
.departments-box-layout7 .single-box:hover {
	background-color: <?php echo esc_html( $primary_color  ); ?>;
}
.service-wrap-layout1.rtin-dark .service-box-layout1 {
	background-color: <?php echo esc_html( $secondery_color  ); ?>;
}
.rt-el-info-box.rtin-style2 .rtin-icon i.primaryColor {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-info-box.rtin-style2 .rtin-icon i.colorGreen {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.service-wrap-layout1.rtin-light .service-box-layout1 {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.service-box-layout1 {	
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.service-box-layout1 .item-title a {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.service-wrap-layout1.rtin-light .service-box-layout1:hover {
	background-color: <?php echo esc_html( $secondery_color  ); ?>;
}
.rdtheme-button-3{
	color: <?php echo esc_html( $primary_color ); ?>!important;
}
.rt-el-info-box:hover .rtin-icon i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.service-box-layout1 p {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.rt-el-info-box .rtin-content .rtin-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-info-box.rtin-style1.rtin-light .rtin-content .rtin-title a,
.rt-el-info-box.rtin-style1.rtin-light .rtin-icon i,
.rt-el-info-box.rtin-style1.rtin-light .rtin-content .rtin-title {
	color: <?php echo esc_html( $secondery_color );?>!important;
}
.rt-el-info-box.rtin-style3 .rtin-icon .rtin-button {	
	background-color: rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.9);	
}
.rt-el-twt-2 .rtin-title span {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-twt-2 .rtin-content ul li:after {
	color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Text With Title
---------------------------------------*/
?>
.rt-el-twt-3 .rtin-title:after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Navigation Menu
---------------------------------------*/
?>
.rt-el-nav-menu.widget ul li.current-menu-item a,
.rt-el-nav-menu.widget ul li.current-menu-item a:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.site-header .main-navigation > nav > ul > li > a:after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
<?php
/*-------------------------------------
#. EL: Contact
---------------------------------------*/
?>
.rt-el-contact ul li i {
	color: <?php echo esc_html( $primary_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Slider
---------------------------------------*/
?>
.about-box-layout14 .item-video .video-icon .popup-video {
	background: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.site-wrp .nav-control-layout-top2 .owl-nav .owl-prev:hover,
.site-wrp .nav-control-layout-top2 .owl-nav .owl-next:hover {
	box-shadow: 0px 4px 20px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);
}
.site-wrp .ls-v6 .ls-nav-prev:hover,
.site-wrp .ls-v6 .ls-nav-next:hover {
	border: 2px solid <?php echo esc_html( $primary_color ); ?> !important;
	background-color: <?php echo esc_html( $primary_color ); ?> !important;
}

.rt-el-slider .nivo-directionNav a.nivo-prevNav:before, 
.rt-el-slider .nivo-directionNav a.nivo-nextNav:before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-el-slider .nivo-directionNav a.nivo-prevNav:hover,
.rt-el-slider .nivo-directionNav a.nivo-nextNav:hover {
		background-color: <?php echo esc_html( $primary_color ); ?>;
}


<?php
/*-------------------------------------
#. EL: Price table
---------------------------------------*/
?>

.price-table-layout3 .tpt-col-inner:hover{
	background: <?php echo esc_html( $primary_color ); ?>;	
}
.price-table-layout2:after {
	background: <?php echo esc_html( $secondery_color ); ?>;	
}
.price-table-layout2 .tpt-header .tpt-header-top .tpt-title:before {
	background-color: <?php echo esc_html( $secondery_color ); ?>;
}
.price-table-layout2 .tpt-header .tpt-header-top .tpt-title:after {
	background-color: <?php echo esc_html( $secondery_color ); ?>;
}
.price-table-layout3 .tpt-footer .tpt-footer-btn {	
	background-color: <?php echo esc_html( $secondery_color ); ?>;
}
.price-table-layout3 .tpt-col-inner:hover .tpt-header .tpt-header-top {
	border-bottom: 1px solid <?php echo esc_html( $secondery_color ); ?>;
}

<?php
/*-------------------------------------
#. EL: Departments
---------------------------------------*/
?>

.departments-wrap-layout2 .owl-theme .owl-dots .owl-dot.active span, 
.departments-wrap-layout2 .owl-theme .owl-dots .owl-dot:hover span {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}

.departments-box-layout2update .item-btn {
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.departments-box-layout2update .item-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.about-box-layout17 .item-video .video-icon .play-btn i::before {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.departments-box-layout3 .single-item .media .media-body a.item-btn:hover {
	border: 1px solid #fff;	
}
.departments-box-layout3 .single-item .media .media-body a.item-btn {	
	border: 1px solid <?php echo esc_html( $primary_txt_color ); ?>;
	color:<?php echo esc_html( $primary_txt_color ); ?>;	
}
.departments-box-layout3 .single-item .media .media-body ul.list-item li {
	border-right: 1px solid #4b7af9;
}
.departments-box-layout3 .single-item .media .media-body .item-title,
.departments-box-layout3 .single-item .media .media-body ul.list-item li .item-icon i::before,
.departments-box-layout3 .single-item .media .media-body ul.list-item li .item-text .inner-item-title ,
.departments-box-layout3 .single-item .media .media-body ul.list-item li .item-text span {
	color:<?php echo esc_html( $primary_txt_color ); ?>;
}
.departments-box-layout3 .single-item .media .media-body .item-title::before {
	background-color:<?php echo esc_html( $primary_txt_color ); ?>;	
}
.departments-box-layout3 .single-item .media .media-body p {
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
.departments-box-layout3 .nav-wrap .nav-item.slick-slide.slick-current {
	background: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}

.departments-box-layout3 .single-item .media {
	background: <?php echo esc_html( $primary_color ); ?>;
}
.departments-box-layout3 .single-item .media .media-body .ctg-item-icon i::before {	
	color: <?php echo esc_html( $secondery_color ); ?>;
}
.departments-box-layout3 .single-item .media .media-body a.item-btn:hover {	
	color: <?php echo esc_html( $primary_color ); ?>;
}

.departments-box-layout3 .slick-navigation {	
	color: <?php echo esc_html( $primary_color ); ?>;
	border: 1px solid <?php echo esc_html( $primary_color ); ?>;	
}
.departments-box-layout3 .slick-navigation:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.departments-box-layout1 .item-img::after {	
	background-color: rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.9);
}
.departments-box-layout1 .item-img .item-btn-wrap a.item-btn:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.departments-box-layout1 .item-content .department-info li i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.loadmore-layout1 .item-btn {	
	border-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_color ); ?>;	
}
.loadmore-layout1 .item-btn:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.site.site-wrp .elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
.site.site-wrp .elementor-accordion .elementor-accordion-item .elementor-tab-title.elementor-active a{	
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}

.site.site-wrp .elementor-accordion .elementor-accordion-item .elementor-tab-title:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;		
}
.faq-ask-question-layout1 .faq-question-box .form-group .item-btn,
.appointment-box-layout1 .item-btn 
 {	
	border-color: <?php echo esc_html( $primary_color ); ?>;	
	background-color: <?php echo esc_html( $primary_color ); ?>;	
	color: <?php echo esc_html( $primary_txt_color ); ?>;
	-webkit-box-shadow: 0px 2px 15px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);
	-moz-box-shadow: 0px 2px 15px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);
	box-shadow: 0px 2px 15px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);
}
.faq-ask-question-layout1 .faq-question-box .form-group .item-btn:hover,
.appointment-box-layout1 .item-btn:hover{
	background-color: <?php echo esc_html( $primary_color ); ?>;	
	box-shadow: inherit;
}
.title-bar-primary6::after {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.pricing-box-layout1 .box-content .item-btn {	
	border-color: <?php echo esc_html( $primary_color ); ?>;	
	color: <?php echo esc_html( $primary_color ); ?>;
	
}
.pricing-box-layout1:hover .box-content .item-btn:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.pricing-box-layout1:hover .box-content .item-btn {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.site-wrp .departments-box-layout2update .item-btn:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
.departments-box-layout2update .item-btn:hover i {
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
<?php
/*-------------------------------------
#. EL: Services
---------------------------------------*/
?>
.services-tab1 .services-tab-content .popup-video::before {
	background-color:  rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.4);
}
.services-tab1 .services-tab-content .popup-video {
background-color: <?php echo esc_html( $primary_color ); ?>
}
.services-tab1 .nav-wrap .nav-item.nav-link.active {
	border-bottom: 2px solid <?php echo esc_html( $primary_color ); ?>;
}
.services-tab1 .services-tab-content .item-title::before {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}	
.services-tab1 .services-tab-content ul.list-info li::after {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.item-btn.iconlight {	
	border-color: <?php echo esc_html( $primary_color ); ?>;
}
.item-btn.iconlight:hover i {
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.item-btn.iconlight:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;
	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.services-tab1 .nav-wrap .nav-item.nav-link:hover {
	border-color: transparent transparent <?php echo esc_html( $primary_color ); ?> transparent;
}
.services-tab1 .item-img .video-icon .popup-video {
	background-color: <?php echo esc_html( $primary_color ); ?>;

	color: <?php echo esc_html( $primary_txt_color ); ?>;
}
.services-tab1 .item-img .video-icon .popup-video::before {
	background-color:  rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.4);
}
.services-tab1 .item-img .video-icon .popup-video::after {
	background-color:  rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.5);
}
.services-tab1 .item-img .video-icon .play-btn i::before {
	color:<?php echo esc_html( $primary_txt_color ); ?>;
}
.departments-box-layout3 .single-item .media .media-body ul.list-item li {
	border-right: 1px solid <?php echo esc_html( $secondery_color ); ?>;	
}


@keyframes shadow-pulse {
  0% {
    box-shadow: 0 0 0 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.8);
  }
  100% {
    box-shadow: 0 0 0 35px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0);
  }
}
@keyframes shadow-pulse-big {
  0% {
    box-shadow: 0 0 0 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.7);
  }
  100% {
    box-shadow: 0 0 0 70px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0);
  }
}
.testmonial-box-layout3 .item-content p::after {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.testmonial-box-layout3 .item-img img {	
	border: 4px solid <?php echo esc_html( $secondery_color ); ?>;
}
.nav-control-layout2.owl-theme .owl-nav > div {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.heading-layout4 span.rtin-beforetitle {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.class-schedule-wrap1 table thead tr td {
	border: 2px solid <?php echo esc_html( $primary_color ); ?>;	
}
.class-schedule-wrap1 table tbody tr td {
	border: 2px solid <?php echo esc_html( $primary_color ); ?>;	
}
.class-schedule-wrap1 table tbody tr th {
	border: 2px solid <?php echo esc_html( $primary_color ); ?>;	
}

.class-schedule-wrap1 table thead tr th {	
	border: 2px solid <?php echo esc_html( $primary_color ); ?>;	
}





.blog-box-layout5 .item-content .post-date.add-pimg {
	background-color: <?php echo esc_html( $primary_color ); ?>;
}
.blog-box-layout5 .item-content .post-actions-wrapper ul li .item-btn {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.blog-box-layout5 .item-content .post-actions-wrapper ul li .item-btn i {
	color: <?php echo esc_html( $secondery_color ); ?>;
}
.blog-box-layout5 .item-content .post-actions-wrapper ul li .item-btn:hover {
	color: <?php echo esc_html( $secondery_color ); ?>;
}
.blog-box-layout5 .item-content .post-actions-wrapper ul li .item-btn:hover i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.blog-box-layout5 .item-content .post-actions-wrapper ul li a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.blog-box-layout5 .item-content .post-actions-wrapper ul li a:hover i {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.blog-box-layout5 .item-content .item-title a:hover {
	color: <?php echo esc_html( $primary_color ); ?>;
}


.appointment-box-layout1 .form-group .item-btn.wpcf7-submit {	
	box-shadow: 0px 1px 10px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);	
}
.nav-control-layout3.owl-theme .owl-prev:hover,
.nav-control-layout3.owl-theme .owl-next:hover {
	background: <?php echo esc_html( $primary_color ); ?> !important;	
}

.title-bar-primary2::before {	
	background: <?php echo esc_html( $primary_color ); ?>;	
}
.widget-about-team .item-content .item-designation {
	color: <?php echo esc_html( $primary_color ); ?>;	
}
.widget-team-contact ul li ul.widget-social li a {
	color: <?php echo esc_html( $primary_color ); ?>;		
}
.widget-call-to-action {
	background-color: <?php echo esc_html( $primary_color ); ?>;		
	box-shadow: 0px 1px 10px 0px rgba(<?php echo esc_html( $primary_rgb ); ?>, 0.75);
}


.error-box-layout1 .item-btn {	
	border: 2px solid <?php echo esc_html( $primary_color ); ?>;	
	color: <?php echo esc_html( $primary_color ); ?>;	
}
.error-box-layout1 .item-btn:hover {
	background-color: <?php echo esc_html( $primary_color ); ?>;	
	color: <?php echo esc_html( $primary_txt_color ); ?>;	
}
.rt-el-info-box.rtin-style11 .rtin-icon {
background-color: <?php echo esc_html( $primary_color ); ?>;	
}
.appointment-box-layout1.light .form-group .item-btn.wpcf7-submit {
background-color: <?php echo esc_html( $primary_color ); ?>;	
}

.appointment-box-layout1.light .select2-container--classic .select2-selection--single .select2-selection__arrow b {
border-color: <?php echo esc_html( $primary_color ); ?> transparent transparent transparent;
}