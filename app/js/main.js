/**
 * Created by bridark on 20/06/15.
 */
$(document).ready(function () {
    //Contact form
    $('#contactForm').submit(function (event) {
        event.preventDefault();
        var form = $(this);
        $.ajax({
            method:'POST',
            url:'mail.php',
            data:form.serialize(),
            success:function(response){
                if(response === 'true'){
                    alert("Form successfully submitted, Thank you!");
                    window.location.href = "index.html";
                }else{
                    alert("There was an error during submission please try again");
                }
            }
        })
    });
    //Quote form
    $('#quoteBtn').click(function (event) {
        event.preventDefault();
        var form = $("#quoteForm");
        if(form[0].elements[0].value !=='' && form[0].elements[2].value !==''){
            $.ajax({
                method:'POST',
                url:'mail.php',
                data:form.serialize(),
                success:function(response){
                    if(response === 'true'){
                        alert("Form successfully submitted, Thank you!");
                        window.location.href = "index.html";
                    }else{
                        alert("There was an error during submission please try again");
                    }
                }
            });
        }else{
            alert('Please fill out your name and phone number');
        }
    });
});