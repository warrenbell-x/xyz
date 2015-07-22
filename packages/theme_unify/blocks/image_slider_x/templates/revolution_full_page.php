<?php defined('C5_EXECUTE') or die("Access Denied.");
$navigationTypeText = ($navigationType == 0) ? 'arrows' : 'pages';
$c = Page::getCurrentPage();
if ($c->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item" style="width: <?php echo $width; ?>; height: <?php echo $height; ?>">
        <div style="padding: 40px 0px 40px 0px"><?php echo t('Image Slider disabled in edit mode.')?></div>
    </div>
<?php  } else { ?>
    <!--=== Slider ===-->
    <div class="tp-banner-container">
        <div class="tp-banner">
            <?php if(count($rows) > 0) { ?>
                <ul>
                    <?php
                    $i = 1;
                    foreach($rows as $row) { ?>
                        <!-- SLIDE -->
                        <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide <?php echo $i?>">
                            <!-- MAIN IMAGE -->
                            <?php
                            $f = File::getByID($row['fID'])
                            ?>
                            <?php if(is_object($f)) {
                                $tag = Core::make('html/image', array($f, false))->getTag();
                                $tag->alt("darkblurbg");
                                $tag->dataBgfit("cover");
                                $tag->dataBgposition("center center");
                                $tag->dataBgrepeat("no-repeat");
                                $tag->width("");
                                $tag->height("");
                                print $tag; ?>
                            <?php } ?>

                            <!-- LAYER -->
                            <div class="tp-caption re-title-v1 sft start"
                                 data-x="center"
                                 data-hoffset="0"
                                 data-y="100"
                                 data-speed="1500"
                                 data-start="500"
                                 data-easing="Back.easeInOut"
                                 data-endeasing="Power1.easeIn"
                                 data-endspeed="300">
                                <?php echo $row['title'] ?>
                            </div>
                            <!-- END LAYER -->

                            <!-- LAYER -->
                            <div class="tp-caption re-text-v1 sft"
                                 data-x="center"
                                 data-hoffset="0"
                                 data-y="200"
                                 data-speed="1400"
                                 data-start="2000"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="off"
                                 style="z-index: 6">
                                Unify is creative technology company providing key digital services on web and mobile. <br>
                                We minimize the gap between technology and its audience.
                            </div>
                            <!-- END LAYER -->

                            <!-- LAYER -->
                            <div class="tp-caption sft"
                                 data-x="center"
                                 data-hoffset="0"
                                 data-y="320"
                                 data-speed="1600"
                                 data-start="2800"
                                 data-easing="Power4.easeOut"
                                 data-endspeed="300"
                                 data-endeasing="Power1.easeIn"
                                 data-captionhidden="off"
                                 style="z-index: 6">
                                <a href="#" class="btn-u btn-u-lg re-btn-brd margin-right-5">Read About Us</a>
                                <a href="#" class="btn-u btn-u-lg">Visit Our Work</a>
                            </div>
                            <!-- END LAYER -->
                        </li>
                        <!-- END SLIDE -->
                        <?php
                        $i += 1;
                    } ?>
                </ul>
            <?php } else { ?>
                <div class="ccm-image-slider-placeholder">
                    <p><?php echo t('No Slides Entered.'); ?></p>
                </div>
            <?php } ?>
            <div class="tp-bannertimer tp-bottom"></div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            RevolutionSlider.initRSfullScreenOffset();
        });
    </script>
    <!--=== End Slider ===-->
<?php } ?>
