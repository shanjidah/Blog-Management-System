
<!DOCTYPE html>
<html>
<head>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<style>

.center {
    margin-top:50px;   
}

.modal-header {
	padding-bottom: 5px;
}

.modal-footer {
    	padding: 0;
	}
    
.modal-footer .btn-group button {
	height:40px;
	border-top-left-radius : 0;
	border-top-right-radius : 0;
	border: none;
	border-right: 1px solid #ddd;
}
	
.modal-footer .btn-group:last-child > button {
	border-right: 0;
}
</style>
</head>
<body>

    <div class="center"><button data-toggle="modal" data-target="#squarespaceModalforRegistration" class="btn btn-primary center-block">Registration</button></div>
    <div class="center"><button data-toggle="modal" data-target="#squarespaceModalforLogin" class="btn btn-primary center-block">Login</button></div>

<!-- registration modal -->
<div class="modal fade" id="squarespaceModalforRegistration" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Registration</h3>
            </div>
            <div class="modal-body">
                
                <!-- content goes here -->
                <form action="result.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                    </div>

                    <div class="checkbox">
                        <label>
                        <input type="checkbox" name="check[]" value="ok"> Check me out
                        </label>
                        <label>
                        <input type="checkbox" name="check[]" value="not ok"> done
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--login model -->

<div class="modal fade" id="squarespaceModalforLogin" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">Login</h3>
		</div>
		<div class="modal-body">
			
    
			<form action="result.php" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
              </div>
          
              <button type="submit" class="btn btn-default">Login</button>
            </form>

		</div>
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>



</body>
</html>
