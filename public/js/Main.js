$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }


    });
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered


    $('.modal').modal();

    $('select').material_select();
    $('.MCQ').click(function () {
        $('.MCQ').removeClass("active");
        $(this).addClass("active");
    });


    $('.lifecard').click(function () {
        if($('.ClickedCard').length < 4) {
            $(this).addClass("ClickedCard");
            $(this).removeClass("blue-grey");
        }
        if($('.ClickedCard').length == 4)
        {
           //fadeloop('.go',1500,1200,true);
           $('.go').addClass('Done');
            $('.go').attr("href","#lifecardModal");
            $('.go').removeClass("disabled");



        }
    });
    $('#lifeCardSubmitBtn').click(function () {

        var obj = {};
        $('.Disablelifecard').each(function (index, select) {

            obj['card'+ (index+1)] = select.id;
        });

        CallAjax("/lifecard",obj,'POST',function (data) {
            var statusHTML = "";
            console.log(data);
            $.each(data,function (index, card) {
                statusHTML +='<li class="collection-item lifecardscenario">';
                if(index == 0)
                {
                    statusHTML += "A) "
                }
                if(index == 1)
                {
                    statusHTML += "B) "
                }
                if(index == 2)
                {
                    statusHTML += "C) "
                }
                if(index == 3)
                {
                    statusHTML += "D) "
                }
                statusHTML += card.Question + '</li>';
            });
            $('ul.lifecardModalList').html(statusHTML);
        });
    });

    $('.shuffle').click(function () {
        $('.lifecard').removeClass("ClickedCard");
        $('.lifecard').removeClass("Disablelifecard");
        $('.lifecard').addClass("blue-grey");
        $('.go').attr("href","#");
        $('.go').removeClass('Done');
        //fadeloop('.go',1500,1200,false);

    });

    $(".go .material-icons").click(function () {
        if($('.go').attr('href') == "#lifecardModal") {
            $('.ClickedCard').addClass('Disablelifecard');
            $('.Disablelifecard').removeClass('ClickedCard');
            $('.go').addClass("disabled");
        }  });

    $('.TrivaCard').click(function () {

        var obj = {};
        CallAjax("/triva/"+this.id,obj,'POST',function (data) {
            var statusHTML = "";
            console.log(data);

            $('#TrivaQuestion').html(data.question);
            var ans = JSON.parse(data.answers);
            $("#TriviaCorrectAns").html(data.correct);
            $.each(ans,function (index, card) {
                statusHTML +='<li class="collection-item MCQ">';
                if(index == 0)
                {
                    statusHTML += "A) "
                }
                if(index == 1)
                {
                    statusHTML += "B) "
                }
                if(index == 2)
                {
                    statusHTML += "C) "
                }
                if(index == 3)
                {
                    statusHTML += "D) "
                }
                statusHTML += card + '</li>';
            });
            $('ul.TrivaMCQList').html(statusHTML);
        });
    });

    $('#CreateNewCard').click(function () {
        $('#lifecardSubmit').show();
        $('#lifecardupdate').hide();
        $('#lifecardDelete').hide();
        $('#insertLifeCardForm').attr("action","/SaveLifeCard");


    });

    $('#lifecardSubmit').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['question'] = $('#lifeCardQuestion').val();
        CallAjax("/SaveLifeCard",obj,'POST',function (data) {
            $('#lifeCardQuestion').val('');
            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += '<a href="#createlifeCardModal" class="list-group-item createCard" cardid = " ' + card.id + ' ">' + card.Question + '</a>';
            });
            $('#adminCardList').html(tempStr);
        });

    });
    $('#lifecardupdate').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['question'] = $('#lifeCardQuestion').val();
        CallAjax($('#insertLifeCardForm').attr('action'),obj,'POST',function (data) {
            $('#lifeCardQuestion').val('');
            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += '<a href="#createlifeCardModal" class="list-group-item createCard" cardid = " ' + card.id + ' ">' + card.Question + '</a>';
            });
            $('#adminCardList').html(tempStr);
        });

    });
    $('#lifecardDelete').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['question'] = $('#lifeCardQuestion').val();
        CallAjax($('#lifecardDelete').attr('href'),obj,'POST',function (data) {
            $('#lifeCardQuestion').val('');
            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += '<a href="#createlifeCardModal" class="list-group-item createCard" cardid = " ' + card.id + ' ">' + card.Question + '</a>';
            });
            $('#adminCardList').html(tempStr);
        });

    });

    $('#adminCardList').on("click",".createCard",function () {
        $('#lifeCardQuestion').val();
        $('#lifecardSubmit').hide();
        $('#lifecardupdate').show();
        $('#lifecardDelete').show();
        $('#insertLifeCardForm').attr("action","/UpdateLifeCard/" + $(this).attr('cardid'));
        $('#lifecardDelete').attr("href","/DeleteLifeCard/" + $(this).attr('cardid'));
        $('#lifeCardQuestion').val($(this).html().trim());
    });


    $('#CreateNewTreevia').click(function () {
        $('#TreeViaSubmit').show();
        $('#TreeViaupdate').hide();
        $('#TreeViaDelete').hide();
        $('#insertTreeViaForm').attr("action","/SaveTreeVia");
        $('#TreeViaQuestion').val('');
        $('#TreeViaA').val('');
        $('#TreeViaB').val('');
        $('#TreeViaC').val('');
        $('#TreeViaD').val('');
        $('#TreeViaCorrectOption').val();
    });

    $('#TreeViaSubmit').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['question'] = $('#TreeViaQuestion').val();
        var options = [$('#TreeViaA').val(),$('#TreeViaB').val(),$('#TreeViaC').val(),$('#TreeViaD').val()];
        obj['options'] = JSON.stringify(options);
        obj['correctOption'] = $('#TreeViaCorrectOption').val();
        obj['category'] = $("#CategoryDropDown").val();
        CallAjax("/SaveTreeVia",obj,'POST',function (data) {

            $('#TreeViaQuestion').val('');
            $('#TreeViaA').val('');
            $('#TreeViaB').val('');
            $('#TreeViaC').val('');
            $('#TreeViaD').val('');
            $('#TreeViaCorrectOption').val();
            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += ' <a href="#createTreviaModal" class="list-group-item TreeViaItem" TreeViaID = "' + card.id + '"options = "' + card.answers +'" correct = "' + card.correct +'" question="' + card.question+ '"category = "' + card.categories.id +'">' + card.question  +
                '<span class="badge" style="color: white; background-color: #2bbdaf" >' + card.categories.name + '</span>'+ '</a>';
            });
            $('#adminTriviaList').html(tempStr);
        });

    });
    $('#TreeViaupdate').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['question'] = $('#TreeViaQuestion').val();
        var options = [$('#TreeViaA').val(),$('#TreeViaB').val(),$('#TreeViaC').val(),$('#TreeViaD').val()];
        obj['options'] = JSON.stringify(options);
        obj['correctOption'] = $('#TreeViaCorrectOption').val();
        obj['category'] = $("#CategoryDropDown").val();
        CallAjax($('#insertTreeViaForm').attr('action'),obj,'POST',function (data) {
            console.log(data);
            $('#TreeViaQuestion').val('');
            $('#TreeViaA').val('');
            $('#TreeViaB').val('');
            $('#TreeViaC').val('');
            $('#TreeViaD').val('');
            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += '<a href="#createTreviaModal" class="list-group-item TreeViaItem" TreeViaID = "' + card.id + '" options = "' + card.answers +'" correct = "' + card.correct +'" question="' + card.question+ '"category = "' + card.categories.id +'">' + card.question  +
                    ' <span class="badge" style="color: white; background-color: #2bbdaf" >' + card.categories.name + '</span></a>';
            });
            $('#adminTriviaList').html(tempStr);
        });

    });
    $('#TreeViaDelete').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['question'] = $('#lifeCardQuestion').val();
        CallAjax($('#TreeViaDelete').attr('href'),obj,'POST',function (data) {
            $('#TreeViaQuestion').val('');
            $('#TreeViaA').val('');
            $('#TreeViaB').val('');
            $('#TreeViaC').val('');
            $('#TreeViaD').val('');
            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += ' <a href="#createTreviaModal" class="list-group-item TreeViaItem" TreeViaID = "' + card.id + '" options = "' + card.answers +'" correct = "' + card.correct +'" question="' + card.question+ '" category = "' + card.categories.id +'">' + card.question  +
                    '<span class="badge" style="color: white; background-color: #2bbdaf" >' + card.categories.name + '</span>'+ '</a>';
            });
            $('#adminTriviaList').html(tempStr);
        });

    });

    $('#adminTriviaList').on("click",".TreeViaItem",function () {

        $('#TreeViaSubmit').hide();
        $('#TreeViaupdate').show();
        $('#TreeViaDelete').show();
        $('#insertTreeViaForm').attr("action","/UpdateTreeVia/" + $(this).attr('TreeViaID'));
        $('#TreeViaDelete').attr("href","/DeleteTreeVia/" + $(this).attr('TreeViaID'));
        $('#TreeViaQuestion').val($(this).attr("question"));
        var options  = JSON.parse($(this).attr('options'))
        $('#TreeViaA').val(options[0]);
        $('#TreeViaB').val(options[1]);
        $('#TreeViaC').val(options[2]);
        $('#TreeViaD').val(options[3]);
        $('#TreeViaCorrectOption').val($(this).attr('correct'));
        $('#TreeViaQuestion').val();
    });



    $('#CreateNewTreeviaCategory').click(function () {
        $('#TreeViaCategorySubmit').show();
        $('#TreeViaCategoryupdate').hide();
        $('#TreeViaCategoryDelete').hide();
        $('#insertTreeViaCategoryForm').attr("action","/SaveTreeViaCategory");
        $('#TreeViaCategoryTxt').val('');
    });

    $('#TreeViaCategorySubmit').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['name'] = $('#TreeViaCategoryTxt').val();
        CallAjax("/SaveTreeViaCategory",obj,'POST',function (data) {

            $('#SaveTreeViaCategory').val('');
            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += '  <a href="#createTreeViaCategoryModal" class="list-group-item TreeViaCategoryItem" CategoryID = " ' + card.id + '">' + card.name  + '</a>';
            });
            $('#adminTreeViaCategoryList').html(tempStr);
        });

    });
    $('#TreeViaCategoryupdate').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['name'] = $('#TreeViaCategoryTxt').val();
        CallAjax($('#insertTreeViaCategoryForm').attr('action'),obj,'POST',function (data) {
            $('#CategoryDropDown').val('');
            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += '  <a href="#createTreeViaCategoryModal" class="list-group-item TreeViaCategoryItem" CategoryID = " ' + card.id + '">' + card.name  + '</a>';
            });
            $('#adminTreeViaCategoryList').html(tempStr);
        });

    });
    $('#TreeViaCategoryDelete').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['name'] = $('#TreeViaCategoryTxt').val();
        CallAjax($('#TreeViaCategoryDelete').attr('href'),obj,'POST',function (data) {
            $('#CategoryDropDown').val('');
            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += '  <a href="#createTreeViaCategoryModal" class="list-group-item TreeViaCategoryItem" CategoryID = " ' + card.id + '">' + card.name  + '</a>';
            });
            $('#adminTreeViaCategoryList').html(tempStr);
        });

    });

    $('#adminTreeViaCategoryList').on("click",".TreeViaCategoryItem",function () {

        $('#TreeViaCategorySubmit').hide();
        $('#TreeViaCategoryupdate').show();
        $('#TreeViaCategoryDelete').show();
        $('#insertTreeViaCategoryForm').attr("action","/UpdateTreeViaCategory/" + $(this).attr('CategoryID'));
        $('#TreeViaCategoryDelete').attr("href","/DeleteTreeViaCategory/" + $(this).attr('CategoryID'));
        $('#TreeViaCategoryTxt').val($(this).html().trim());
    });


    $('#CreateNewJob').click(function () {
        $('#JobsSubmit').show();
        $('#Jobsupdate').hide();
        $('#JobsDelete').hide();
        $('#insertJobsForm').attr("action","/SaveJobs");
        $('#JobTitle').val("");
        $('#JobDescription').val("");

    });

    $('#JobsSubmit').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['title'] = $('#JobTitle').val();
        obj['description'] = $('#JobDescription').val();
        CallAjax("/SaveJobs",obj,'POST',function (data) {
            $('#lifeCardQuestion').val('');
            var tempStr = '';
            $.each(data,function (index,jobs) {
                tempStr += '<a href="#createJobsModal" class="list-group-item jobItem" JobID = " ' + jobs.id + ' " description="'+jobs.description+'">' + jobs.title + '</a>';
            });
            $('#adminJobList').html(tempStr);
        });

    });
    $('#Jobsupdate').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['title'] = $('#JobTitle').val();
        obj['description'] = $('#JobDescription').val();
        CallAjax($('#insertJobsForm').attr('action'),obj,'POST',function (data) {
            $('#lifeCardQuestion').val('');
            var tempStr = '';
            $.each(data,function (index,jobs) {
                tempStr += '<a href="#createJobsModal" class="list-group-item jobItem" JobID = " ' + jobs.id + ' " description="'+jobs.description+'">' + jobs.title + '</a>';
            });
            $('#adminJobList').html(tempStr);
        });

    });
    $('#JobsDelete').click(function (e) {
        e.preventDefault();
        var obj = {};
        CallAjax($('#JobsDelete').attr('href'),obj,'POST',function (data) {
            console.log(data);
            var tempStr = '';
            $.each(data,function (index,jobs) {
                tempStr += '<a href="#createJobsModal" class="list-group-item jobItem" JobID = " ' + jobs.id + ' " description="'+jobs.description+'">' + jobs.title + '</a>';
            });
            $('#adminJobList').html(tempStr);
        });

    });

    $('#adminJobList').on("click",".jobItem",function () {
        $('#JobsSubmit').hide();
        $('#Jobsupdate').show();
        $('#JobsDelete').show();
        $('#insertJobsForm').attr("action","/UpdateJobs/"+$(this).attr('JobID'));
        $('#JobsDelete').attr("href","/DeleteJobs/"+$(this).attr('JobID'));
        $('#JobTitle').val($(this).html().trim());
        $('#JobDescription').val($(this).attr('description').trim());
    });



    $('#CreateNewUser').click(function () {
        $('#UsersSubmit').show();
        $('#Usersupdate').hide();
        $('#UsersDelete').hide();
        $('#insertJobsForm').attr("action","/SaveUser");
        $('#FullName').val("");
        $('#UserName').val("");
        $('#Password').val("");

    });

    $('#UsersSubmit').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['FullName'] = $('#FullName').val();
        obj['UserName'] = $('#UserName').val();
        obj['Password'] = $('#Password').val();
        CallAjax("/SaveUser",obj,'POST',function (data) {
            console.log(data);
            $('#lifeCardQuestion').val('');
            var tempStr = '';
            $.each(data,function (index,user) {
                tempStr += '<a href="#createAccountModal" class="list-group-item userItem" UserID = " ' + user.id + ' " UserName="'+user.userName+'" name="'+user.name+'" password="'+user.password+'">' + user.userName + '</a>';
            });
            $('#adminUserList').html(tempStr);
        });

    });
    $('#Usersupdate').click(function (e) {
        e.preventDefault();
        var obj = {};
        obj['FullName'] = $('#FullName').val();
        obj['UserName'] = $('#UserName').val();
        obj['Password'] = $('#Password').val();
        CallAjax($('#insertUsersForm').attr('action'),obj,'POST',function (data) {
            var tempStr = '';
            $.each(data,function (index,user) {
                tempStr += '<a href="#createAccountModal" class="list-group-item userItem" UserID = " ' + user.id + ' " UserName="'+user.userName+'" name="'+user.name+'" password="'+user.password+'">' + user.userName + '</a>';
            });
            $('#adminUserList').html(tempStr);
        });

    });
    $('#UsersDelete').click(function (e) {
        e.preventDefault();
        var obj = {};
        CallAjax($('#UsersDelete').attr('href'),obj,'POST',function (data) {
            console.log(data);
            var tempStr = '';
            $.each(data,function (index,user) {
                tempStr += '<a href="#createAccountModal" class="list-group-item userItem" UserID = " ' + user.id + ' " UserName="'+user.userName+'" name="'+user.name+'" password="'+user.password+'">' + user.userName + '</a>';
            });
            $('#adminUserList').html(tempStr);
        });

    });

    $('#adminUserList').on("click",".userItem",function () {
        $('#UsersSubmit').hide();
        $('#Usersupdate').show();
        $('#UsersDelete').show();
        $('#insertUsersForm').attr("action","/UpdateUser/"+$(this).attr('UserID'));
        $('#UsersDelete').attr("href","/DeleteUser/"+$(this).attr('UserID'));
        $('#UserName').val($(this).attr('UserName').trim());
        $('#Password').val($(this).attr('password').trim());
        $('#FullName').val($(this).attr('name').trim());
    });

    $('#TreeViaMenu,#TreeViaNav').click(function (e) {
        e.preventDefault();
        var obj = {};

        CallAjax("/Categories",obj,'POST',function (data) {

            var tempStr = '';
            $.each(data,function (index,card) {
                tempStr += '<div class="col s3"> <div class="card blue-grey TrivaCard" style="text-align: center;"> <a  class = "modal-trigger  waves-light " href="/category/'+ card.id +'/treevia"> <div class="card-content white-text">'+
                 '   <spam class="treeviaElement">' +card.name +'</spam> </div></a></div></div>';
            });
            $('#CategoryListModal').html(tempStr);
            $('#TreeViaModal').modal('open');
        });
    });

    $('#FoodNav,#FoodTile').click(function (e) {
        e.preventDefault();
        var obj = {};
        CallAjax("/Food",obj,'POST',function (data) {

            var tempStr = '';
            var rand = getRandomInt(data.MinRange,data.MaxRange);
            tempStr += '<div class="col s3"> <div class="card blue-grey TrivaCard" style="text-align: center;">  <div class="card-content white-text">'+
                rand +'   </div></div></div>';

            $('#FoodPointRow').html(tempStr);
            $('#FoodPointModal').modal('open');
        });

    })

});
function fadeloop(el,timeout,timein,loop){
    var $el = $(el),intId,fn = function(){
        $el.animate({opacity:'0.5'},timeout);$el.animate({opacity:'1'},timein);
    };
    fn();
    if(loop){
        intId = setInterval(fn,timeout+timein+100);
        return intId;
    }
    return false;
}

function CallAjax(URL,Data,Type,CallBack,isFormData){
    var obj={
        url: URL,
        data: Data,
        type: Type,
        error: function() {
            if(CallBack){
                CallBack("Error");
            }
        },
        success: function(d) {
            if(CallBack){
                CallBack(d||'No - record Found');
            }
        }
    };
    if(isFormData){
        obj['contentType']=false;
        obj['processData']=false;
    }
    $.ajax(obj);
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min; //The maximum is exclusive and the minimum is inclusive
}