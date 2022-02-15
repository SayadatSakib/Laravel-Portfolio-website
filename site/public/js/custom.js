// Owl Carousel Start..................
$(document).ready(function () {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function () {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function () {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });

    two.owlCarousel({
        autoplay: true,
        loop: true,
        dot: true,
        autoplayHoverPause: true,
        autoplaySpeed: 100,
        margin: 10,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

});
// Owl Carousel End..................



// Contact Send
$('#sendBtnID').click(function () {
    let contactName = $('#nameID').val();
    let contactMobile = $('#mobileID').val();
    let contactEmail = $('#emailID').val();
    let contactMsg = $('#msgID').val();
    sendContact(contactName, contactMobile, contactEmail, contactMsg)

});

function sendContact(contact_name, contact_mobile, contact_email, contact_msg) {
    if (contact_name.length == 0) {
        $('#sendBtnID').html("Write Your Name");
        setTimeout(function () {
            $('#sendBtnID').html("Send");
        }, 3000);
    } else if (contact_mobile.length == 0) {
        $('#sendBtnID').html("Write Your Mobile No.");
        setTimeout(function () {
            $('#sendBtnID').html("Send");
        }, 3000);
    } else if (contact_email.length == 0) {
        $('#sendBtnID').html("Write Your Email");
        setTimeout(function () {
            $('#sendBtnID').html("Send");
        }, 3000);
    } else if (contact_msg.length == 0) {
        $('#sendBtnID').html("Write Your Message");
        setTimeout(function () {
            $('#sendBtnID').html("Send");
        }, 3000);
    } else {
        $('#sendBtnID').html("Sending....");
        axios.post('/contactsend', {
            contact_name: contact_name,
            contact_mobile: contact_mobile,
            contact_email: contact_email,
            contact_msg: contact_msg

        }).then(function (response) {
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#sendBtnID').html("Request Successful");
                    setTimeout(function () {
                        $('#sendBtnID').html("Send");
                    }, 4000);
                } else {
                    $('#sendBtnID').html("Request Faild");
                    setTimeout(function () {
                        $('#sendBtnID').html("Send");
                    }, 3000);

                }
            } else {
                $('#sendBtnID').html("Request Faild");
                setTimeout(function () {
                    $('#sendBtnID').html("Send");
                }, 3000);

            }
        }).catch(function (error) {

            $('#sendBtnID').html("Please Try Agein");
            setTimeout(function () {
                $('#sendBtnID').html("Send");
            }, 3000);

        })

    }



}
