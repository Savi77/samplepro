   

        <div class="modal-header bg-info" style="background-color:#009FDF;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Add Attachment</h6>
        </div>
          <div class="modal-body">
            <div class="row">
               <div class="panel panel-flat" style="margin-bottom: 20px;border-color: #ddd;color: #333333;">
                  <div class="panel-body">
                    <form class="form-horizontal" id="addattachform"  enctype='multipart/form-data'>
                      <input type="hidden" name="db_dir_id" id="db_dir_id" >
                          <div class="">   
                             <div class="col-md-12">
                               <div class="form-group ">
                                  <div class="">  
                                   <div class="col-md-12">
                                        <div class="col-xs-1">
                                            <button type="button" class="btn btn-success addButton" style="margin-top:20px;">
                                              <i class="icon-add"></i>
                                            </button>
                                        </div>
                                        <div class="col-xs-6">
                                            Choose File :<input type="file" class="form-control" name="uploadfile[]" >
                                        </div>
                                        <div class="col-xs-5">
                                            Remark :<textarea class="form-control" name="fileremark[]"  maxlength="150" rows="1"></textarea> 
                                        </div>
                                      </div> 
                                 </div>  
                              </div>
                            </div>
                            <div class="col-md-12"> 
                              <div class="form-group hide" id="bookTemplate" >
                                   <div class="col-md-12">
                                        <div class="col-xs-1">
                                           <button type="button" class="btn btn-danger removeButton" style="margin-top:20px">
                                            <i class=" icon-trash"></i>
                                          </button>
                                        </div>
                                        <div class="col-xs-6">
                                            Choose File :<input type="file" class="form-control" name="uploadfile[]" >
                                        </div>
                                        <div class="col-xs-5">
                                            Remark :<textarea class="form-control" name="fileremark[]" maxlength="150"  rows="1"></textarea> 
                                        </div>
                                  </div>
                              </div>  
                           </div>
                            <div class="col-md-3 col-md-offset-4">
                               <br/>
                               <button type="submit" class="btn btn-primary btn-xs"><i class="icon-upload position-left"></i> Upload Document</button>
                               <span id="preview"></span>
                              </div>
                            </div> 
                        </form>  
                    </div>                     
                   </div>
                </div> 
            </div>