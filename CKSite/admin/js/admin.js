$(function(){

    $('#blog').hide();
    $('#creative-writing').hide();
    $('#projects').hide();
    $('#analytics').hide();

$('#side-toggle').on('click',function(){
    console.log("clicked");
    $('#dashboard').toggleClass('dashboard-expanded');
    $('#dash-links').toggleClass('links-appear');
});

$('#blogBtn').on('click',function(){
    
    $('#blog').show();
    $('#creative-writing').hide();
    $('#projects').hide();
    $('#analytics').hide();
    $('#adminCheckbox').prop('checked',false);
});

$('#writingBtn').on('click',function(){
    
    $('#blog').hide();
    $('#creative-writing').show();
    $('#projects').hide();
    $('#analytics').hide();
    $('#adminCheckbox').prop('checked',false);
});

$('#projectsBtn').on('click',function(){
    
    $('#blog').hide();
    $('#creative-writing').hide();
    $('#projects').show();
    $('#analytics').hide();
    $('#adminCheckbox').prop('checked',false);
});

$('#analyticsBtn').on('click',function(){
    
    $('#blog').hide();
    $('#creative-writing').hide();
    $('#projects').hide();
    $('#analytics').show();
    $('#adminCheckbox').prop('checked',false);
});

});