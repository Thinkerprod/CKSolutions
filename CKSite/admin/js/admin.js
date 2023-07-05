$(function(){

    $('#blog').hide();
    $('#creative-writing').hide();
    $('#projects').hide();
    $('#paintings').hide();
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
    $('#paintings').hide();
    $('#analytics').hide();
    $('#adminCheckbox').prop('checked',false);
});

$('#writingBtn').on('click',function(){
    
    $('#blog').hide();
    $('#creative-writing').show();
    $('#projects').hide();
    $('#paintings').hide();
    $('#analytics').hide();
    $('#adminCheckbox').prop('checked',false);
});

$('#projectsBtn').on('click',function(){
    
    $('#blog').hide();
    $('#creative-writing').hide();
    $('#projects').show();
    $('#paintings').hide();
    $('#analytics').hide();
    $('#adminCheckbox').prop('checked',false);
});

$('#paintingsBtn').on('click',function(){
    
    $('#blog').hide();
    $('#creative-writing').hide();
    $('#projects').hide();
    $('#paintings').show();
    $('#analytics').hide();
    $('#adminCheckbox').prop('checked',false);
});

$('#analyticsBtn').on('click',function(){
    
    $('#blog').hide();
    $('#creative-writing').hide();
    $('#projects').hide();
    $('#paintings').hide();
    $('#analytics').show();
    $('#adminCheckbox').prop('checked',false);
});

$('#add-post').on('click',function(){
    $('#dashboard').toggleClass('dashboard-expanded');
    $('#dash-links').toggleClass('links-appear');
    $('#addPostPop').addClass('showAddPost')
    
    
});

if($('#is_creative').val()==0){$('#genre').prop('disabled',true)}


$('#is_creative').on('change',function(){

if($('#is_creative').val()==1){

    $('#category').prop('disabled',true)
    $('#pimage').prop('disabled',true)
    $('#genre').prop('disabled',false)
}
else{
    $('#category').prop('disabled',false)
    $('#pimage').prop('disabled',false)
    $('#genre').prop('disabled',true)
}
})


$('#add-all-paintings').on('click',function(){
    $('#dashboard').toggleClass('dashboard-expanded');
    $('#dash-links').toggleClass('links-appear');
    $('#addall').addClass('showAddAll')
    
    
});

$('#closeAddAll').on('click',function(){
    $('#addall').removeClass('showAddAll')

})

$('#closeAddBtn').on('click',function(){
    $('#addPostPop').removeClass('showAddPost')

})

});