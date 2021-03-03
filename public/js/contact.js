$(document).ready(function () {
    const manageButton = (state) => {
        let sendingText = "Envoi en cours ...";
        let normalText = "ENVOYEZ";
        if (state == 0) {
            console.log("started");
            $("#send-contact-message-btn").attr("disabled", true);
            $("#send-contact-message-btn").text(sendingText);
            $("#send-contact-message-btn").css("cursor", "not-allowed");
            console.log("end start");
        } else {
            console.log("end");
            $("#send-contact-message-btn").attr("disabled", false);
            $("#send-contact-message-btn").text(normalText);
            $("#send-contact-message-btn").css("cursor", "");
        }
    };
    const successActions = (responseMessage) => {
        $(".sent-message-contact").removeClass("d-none");
        $(".error-message-contact").addClass("d-none");
        $("input").val("");
        $("textarea").val("");
        manageButton(1);
    };
    const errorActions = (responseMessage) => {
        $(".sent-message-contact").addClass("d-none");
        $(".error-message-contact").removeClass("d-none");
        manageButton(1);
    };
    $("#send-contact-message-btn").click(function (e) {
        e.preventDefault();
        manageButton(0);
        $(".sent-message-contact").addClass("d-none");
        $(".error-message-contact").addClass("d-none");
        $.ajax({
            type: "POST",
            url: "./new-contact",
            datatype: "json",
            headers: {
                "X-CSRF-TOKEN": $('input[name="_token"]').attr("value"),
            },
            async: true,
            data: {
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                email: $("#email").val(),
                phoneNumber: $("#phoneNumber").val(),
                subject: $("#subject").val(),
                message: $("#message").val(),
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("error !!!!!!!!!");
                let message = "something is worng";
                manageButton(1);
                errorActions(message);
            },
            success: function (response) {
                if (response.success) {
                    successActions(response.message);
                } else {
                    errorActions(response.message);
                }
            },
        });
    });
});
