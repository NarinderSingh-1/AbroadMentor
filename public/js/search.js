function getListData(id) {
    jQuery.ajax({
        url: '/search/list-data',
        type: 'post',
        dataType: 'json',
        data: {id: id, _token: salt},
        beforeSend: function() {
            jQuery("#list-block-" + id).hide();
            jQuery("#img-block-" + id).show()
        }, error: function(e) {
            jQuery("#img-block-" + id).hide();
            jQuery("#list-block-" + id).hide();
        }, success: function(r) {
            if (!r.res) {
                jQuery("#img-block-" + id).hide();
                jQuery("#list-block-" + id).hide();
                return false;
            }

            $("#xhrMentorCount" + id).text(r.data.mentors);
            $("#xhrBranchCount" + id).text(r.data.branch);
            $("#xhrSuccessRate" + id).text(90);
            $.each(r.data.gallery, function(e, v) {
                $("#xhrGalery" + id).append('<a class="example-image-link" href="javascript:void(0);" data-lightbox="example-set1" data-title="">'
                    + '<img class="example-image" src="'+ v.media_url +'" alt=""/>'
                + '</a>');
            });
            
            $.each(r.data.services.major, function(e,v){
                $("#xhrMajorService" + id).append('<a>'+ v +'</a>');
            });

            $.each(r.data.services.other, function(e,v){
                $("#xhrOtherService" + id).append('<li><span>'+ v +'</span></li>');
            });

            $.each(r.data.user, function(e,v) {
                if (v) {
                    var i = e.replace(/_id/, '');
                    $("#xhrSocial"+id).append('<li><a href="'+ v +'" target="blank"><img src="images/'+ i +'.png" /></a></li>');
                }
            });

            jQuery("#img-block-" + id).hide();
            jQuery("#list-block-" + id).show();
        }
    });
}

var profile = {
    initOverviewSection: function(data) {
        jQuery.each(data.services.major, function(k,v){ // Major services
            $(".xhrOverviewMajorService").append('<a>' + v + '</a>');
        });

        jQuery.each(data.services.other, function(k,v){ // Other services
            $(".xhrOverviewOtherService").append('<a>' + v + '</a>');
        });

        jQuery.each(data.gallery, function(k, v){ // Galleries
            $(".xhrOverviewGallery").append('<a href="'+ v.media_url +'"><img class="example-image" src="'+ v.media_url +'" alt=""/></a>');
        })

        jQuery.each(data.branch, function(k, v){ // Branch
            $(".xhrOverviewBranch").append('<li><span><a>'+ v.landmark +'</a></span></li>');
        });
        
        jQuery.each(data.events, function(k,v){
            $(".xhrOverviewEvent").append('<a>'+ v.name +'</a>');
        });
    },
    initMentorSection: function(data) {
        jQuery.each(data.mentors, function(k,v){
            var mentor = '<div class="list_con">'
                    + '<div class="list_div">'
                        + '<div class="list_container">'
                        + '<div class="list_left">'
                            + '<div class="img_con">'
                                + '<img src="/'+ v.photo_url +'">'
                            + '</div>'
                            + '<ul class="so_link">'
                                + '<li><a><i class="commonicon facebook"></i></a></li>'
                            + '</ul>'
                        + '</div>'
                            
                        + '<div class="list_info">'
                            + '<div class="info_top">'
                                + '<a class="blu"><h2>' + v.first_name + ' ' + v.last_name + '</h2></a>'
                                + '<div class="list_detail">'
                                    + '<p>'+ v.qualification.toUpperCase() +'</p>'
                                    + '<p>'+ v.experience +' year(s) experience</p>'
                                    //+ '<p><strong>Expert In:</strong> Study VISA, Work Permit</p>'
                                    + '<p><strong>Designation:</strong> '+ v.designation +'</p>'
                                    + '<p><strong>About:</strong> '+ v.about +'</p>'
                                + '</div>'
                                + '<div class="clearfix"></div>'
                                // + '<p class="all_head">Certified From</p>'
                                // + '<ul class="certified_img gallery-image">'
                                //     + '<li><a href="images/iccrc_logo.png"><img src="images/iccrc_logo.png" /></a></li>'
                                //     + '<li class="view-more"><a>View more</a></li>'
                                // + '</ul>'
                            + '</div>'
                        + '</div>'
                    + '</div>'
                        
                    + '<div class="list_container_info">'
                        + '<div class="vote">'
                            + '<span><img src="/images/like.png"></span>'
                            + '<span>0% </span>'
                            + '<span>(0 Votes)</span>'
                        + '</div>'
                                                            
                        + '<div>'
                            + '<span><img src="/images/money.png"></span>'
                            + '<span>No Assesment Fee</span>'
                        + '</div>'
                        
                        + '<div class="time_con">'
                            + '<span><img src="/images/clock.png"></span>'
                            + '<span>'
                                + '<span class="time">MON-SAT</span>'
                                + '<p>8:AM-8:PM</p>'
                                + '<p><strong>Ludhiana</strong></p>'
                            + '</span>'
                        + '</div>'
                        + '<a class="btn contact_btn">Contact Now</a>'
                    + '</div>'
                + '</div>'
            + '</div>';

            jQuery('.xhrMentorList').append(mentor);
        });
    },
    initServiceSection: function(data) {
        jQuery.each(data.services.major, function(k,v){ // Major services
            $(".xhrServiceMajor").append('<li><a>'+ v +'</a></li>');
        });
        
        jQuery.each(data.services.other, function(k,v){ // Other services
            $(".xhrServiceOther").append('<li>'+ v +'</li>');
        });
        
        jQuery.each(data.tieups, function(k,v){ // Other services
            if(v.university) {
                $(".xhrServiceUniversities").append('<li>'+ v.university +'</li>');
            } else {
                $(".xhrServiceCountries").append('<li><span>'+ v.country_name +'</span></li>');
            }
        });
    },
    initAchievementSection: function(data) {
        jQuery.each(data.achievement, function(k, v){
            var achievement = '<div class="list_container">'
                    + '<div class="list_left">'
                        + '<div class="img_con">'
                            + '<img src="' + v.image + '">'
                        + '</div>'
                + '</div>'
                
                + '<div class="list_info">'
                    + '<div class="info_top">'
                        + '<a class="blu"><h2>' + v.title + '</h2></a>'
                        + '<div class="head_all_txt">'
                            + '<p>' + v.description + '</p>'
                        + '</div>'
                    + '</div>'
                + '</div>'
            + '</div>';
            
            jQuery(".xhrAchievments").append(achievement);
        });

    },
    initMembershipSection: function(data) {
        console.log(data);
    },
    initEventSection: function(data) {
        jQuery.each(data.events, function(k,v) {
            var event = '<li>'
                + '<figure><img src="/images/banner1.jpg" /></figure>'
                + '<div>'
                    + '<strong>'+ v.name +'</strong>'
                    + '<span><img src="/images/location.png" class="user" /></span> <span><a>' + v.hotel + ', ' + v.city + '</a></span>'
                    + '<br />'
                    + '<span><img src="/images/clock.png" class="user" /></span> <span><strong>Mon</strong> '+ v.date +'</span>'
                    + '<p class="all_txt">'+ v.introduction +'</p>'
                    + '<a href="#event_modal" class="eve_btn modal-trigger" title="Register">Register</a>'
                + '</div>'
            '</li>';

            jQuery(".xhrEventList").append(event);
        });
    },
    initTestimonialSection: function(data) {
        console.log(data);
        jQuery.each(data.testimonial, function(k,v){
            var testimonial = '<div class="item">'
                        + '<iframe width="100%" height="200" src="https://www.youtube.com/embed/IsAVGCIQ0Q8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'
                    + '</div>';
            jQuery(".xhrTestimonials").append(testimonial);
        });
    },
    initArticleSection: function(data) {
        console.log(data);
    }
}

function getProfileData(id, type) {
    var loader = "#" + type + " .preloader-wrapper";
    var content = "#" + type + " .preloader-content";

    jQuery.ajax({
        url: '/search/profile-data',
        dataType: 'json',
        data: {id: id, _token: salt, action: type},
        type: 'post',
        beforeSend: function() {
            jQuery(content).hide();
            jQuery(loader).show();
        }, error: function() {
            //
        }, success: function(r) {
            if (r.res) {
                jQuery(loader).hide();
                jQuery(content).show();
                switch(type) {
                    case 'overview':
                        profile.initOverviewSection(r.data);
                        break;
                    case 'mentor':
                        profile.initMentorSection(r.data);
                        break;
                    case 'service':
                        profile.initServiceSection(r.data);
                        break;
                    case 'achievement':
                        profile.initAchievementSection(r.data);
                        break;
                    case 'membership':
                        profile.initMembershipSection(r.data);
                        break;
                    case 'events':
                        profile.initEventSection(r.data);
                        break;
                    case 'testimonials':
                        profile.initTestimonialSection(r.data);
                        break;
                    case 'article':
                        profile.initArticleSection(r.data);
                        break;
                }
            }
        }
    });
}