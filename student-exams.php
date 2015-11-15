<style>
table {
   width:75%;
}
table, th, td {
   border: 1px solid black;
   border-collapse: collapse;
   align: center;
}
th, td {
   padding: 30px;
   text-align: left;
   font-size: 20
 }
table#t1 tr:nth-child(even) {
   background-color: #eee;

}
table#t1 tr:nth-child(odd) {
  background-color:#fff;
}
table#t1 th	{
   background-color: black;
   color: white;
}
</style>
<body>
  <div class="container">
  <h1><center>Schedule an Exam</center></h1>
 <br>
 <nav class="navbar navbar-default">
 <div class="container-fluid">
   <!-- Brand and toggle get grouped for better mobile display -->


   <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">

       <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">&#8195Search by <span class="caret"></span></a>
         <ul class="dropdown-menu">
           <li><a href="#">Class Code</a></li>
           <li><a href="#">Professor</a></li>
           <li><a href="#">Exam Date</a></li>

         </ul>
       </li>
     </ul>

   <form class="navbar-form navbar-left" role="search">
       <div class="form-group">
         <input type="text"size="40" class="form-control" placeholder="Search">
       </div>
       &#8195 &#8195
   <button type="submit" class="btn btn-default">Submit</button>
     </form>

   </div><!-- /.navbar-collapse -->
 </div><!-- /.container-fluid -->
</nav>
</body>
