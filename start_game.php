
<?php
    include('header.php');
    include('global.php');
?>
<p><a href='index.php'>Home</a></p>
<style>
    
    
    .gameBoard{
        width:60vw;
        height: 60vw;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;

    }
    .square{
        width: 12.5%;
        height: 12.5%;
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;


    }
    .blue {
        background-color: blue;
    }
    .red{
        background-color: red;
    }
    .gray{
        background-color: gray;
    }
    
</style>
    <div class="gameBoard">
        <div class="square blue"></div>
        <div class="square red"></div>
        <div class="square gray"></div>
        <div class="square blue"></div>
        <div class="square red"></div>
        <div class="square gray"></div>
        <div class="square blue"></div>
        <div class="square red"></div>

         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>

         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
         <div class="square blue"></div>
         <div class="square red"></div>
         <div class="square gray"></div>
        
    </div>
<?php
include('footer.php');
?>