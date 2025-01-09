 <style>
   p {
     font-weight: bold;
     font-size: large;
   }
 </style>
 <!-- Sidebar -->
 <div class="sidebar sidebar-style-2" data-background-color="dark">
   <div class="sidebar-logo">
     <!-- Logo Header -->
     <div class="logo-header" data-background-color="dark">
       <a href="../login_evaluation/student_final_table.php" class="logo">
         <img
           src="../assets/img/kaiadmin/al-rowad2.png"
           alt="navbar brand"
           class="navbar-brand"
           height="60"
           width="180" />
       </a>
       <div class="nav-toggle">
         <button class="btn btn-toggle toggle-sidebar">
           <i class="gg-menu-right"></i>
         </button>
         <button class="btn btn-toggle sidenav-toggler">
           <i class="gg-menu-left"></i>
         </button>
       </div>
       <button class="topbar-toggler more">
         <i class="gg-more-vertical-alt"></i>
       </button>
     </div>
     <!-- End Logo Header -->
   </div>
   <div class="sidebar-wrapper scrollbar scrollbar-inner">
     <div class="sidebar-content">
       <ul class="nav nav-secondary">
         <!-- <li class="nav-item">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../demo1/index.html">
                        <span class="sub-item">Dashboard 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li> -->
         <li class="nav-section">
           <span class="sidebar-mini-icon">
             <i class="fa fa-ellipsis-h"></i>
           </span>
           <!-- <h4 class="text-section">Components</h4> -->
         </li>
         <li class="nav-item">
           <a  href="../login/main.php">
             <i class="fas fa-home"></i>
             <p>الصفحة الرئيسية</p>
             <!-- <span class="caret"></span> -->
           </a>
         </li>
         <li class="nav-item">
           <a data-bs-toggle="collapse" href="#forms">
             <i class="fas fa-pen-square"></i>
             <p>الإدخال</p>
             <span class="caret"></span>
           </a>
           <div class="collapse" id="forms">
             <ul class="nav nav-collapse">
               <li>
                 <a href="../registration/editingcontent.php">
                   <span class="sub-item">الشروط</span>
                 </a>
               </li>
             </ul>
           </div>
         </li>
         <li class="nav-item">
           <a data-bs-toggle="collapse" href="#tables">
             <i class="fas fa-user-plus"></i>
             <p>التسجيل</p>
             <span class="caret"></span>
           </a>
           <div class="collapse" id="tables">
             <ul class="nav nav-collapse">
               <li>
                 <a href="../registration/studentRegistration.php">
                   <span class="sub-item">تسجيل طالب</span>
                 </a>
               </li>
               <li>
                 <a href="../registration/studentApplicants.php">
                   <span class="sub-item">الطلاب المتقدمين</span>
                 </a>
               </li>
               <li>
                 <a href="../registration/message.php">
                   <span class="sub-item">رسالة</span>
                 </a>
               </li>
             </ul>
           </div>
         </li>
         <li class="nav-item">
           <a data-bs-toggle="collapse" href="#maps">
             <i class="fas fa-user-tie"></i>
             <p>المقابلة</p>
             <span class="caret"></span>
           </a>
           <div class="collapse" id="maps">
             <ul class="nav nav-collapse">
               <li>
                 <a href="../interviews/createInterview.php">
                   <span class="sub-item">انشاء مقابلة</span>
                 </a>
               </li>
               <li>
                 <a href="../interviews/interviewers.php">
                   <span class="sub-item">المقابلين</span>
                 </a>
               </li>
               <li>
                 <a href="../interviews/interviews.php">
                   <span class="sub-item">المقابلات</span>
                 </a>
               </li>
               <li>
                 <a href="../interviews/interviewsResult.php">
                   <span class="sub-item">نتائج المقابلة</span>
                 </a>
               </li>
             </ul>
           </div>
         </li>
         <li class="nav-item">
           <a data-bs-toggle="collapse" href="#charts">
             <i class="fas fa-clipboard-list"></i>
             <p>التقييمات</p>
             <span class="caret"></span>
           </a>
           <div class="collapse" id="charts">
             <ul class="nav nav-collapse">
               <li>
                 <a href="../login_evaluation/Evaluation.php">
                   <span class="sub-item">التقييمات</span>
                 </a>
               </li>
               <li>
                 <a href="../login_evaluation/Residents.php">
                   <span class="sub-item">المقييمين</span>
                 </a>
               </li>
             </ul>
           </div>
         </li>
         <li class="nav-item">
           <a data-bs-toggle="collapse" href="#submenu">
             <i class="far fa-chart-bar"></i>
             <p>تقارير</p>
             <span class="caret"></span>
           </a>
           <div class="collapse" id="submenu">
             <ul class="nav nav-collapse">
               <li>
                 <a href="../registration/studentApplicants.php">
                   <span class="sub-item">نتائج المتقدمين</span>
                 </a>
               </li>
               <li>
                 <a href="../interviews/interviewsResult.php">
                   <span class="sub-item">نتائج المقابلة</span>
                 </a>
               </li>
               <li>
                 <a href="../registration/history.php">
                   <span class="sub-item">مراحل التسجيل</span>
                 </a>
               </li>
             </ul>
           </div>
         </li>
         <li class="nav-item">
           <a  href="../login_evaluation/student_final_table.php">
             <i class="fas fa-users"></i>
             <p>الكشف العام</p>
             <!-- <span class="caret"></span> -->
           </a>
         </li>
       </ul>
     </div>
   </div>
 </div>
 <!-- End Sidebar -->