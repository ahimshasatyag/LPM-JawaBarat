<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Dashboard
         </h1>
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="row">
             <!-- Dashboard Bantuan Sosial -->
             <div class="col-md-3 col-sm-6 col-xs-12">
                 <div class="info-box bg-green">
                     <span class="info-box-icon"> <i class="fa fa-users"></i></span>

                     <div class="info-box-content">
                         <span class="info-box-text">Bantuan Sosial</span>
                         <span class="info-box-number"><?= $this->db->count_all_results('bansos'); ?></span>
                     </div>
                 </div>
             </div>
         </div>
 </div>
 </section>
 </div>