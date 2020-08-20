<?php require './header.php' ?>
    <div class="col-md-6 mx-auto mt-5">
        <div class="card shadow">
            <div class="card-header bg-light">
                <h2>Mailer With PHP Mailer Option</h2>
            </div>
            <div class="card-body">
                <form action="mailer_send.php" method="post">
                    <div class="form-group">
                        <label for="my-input">Name</label>
                        <input id="my-input" class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Email</label>
                        <input id="my-input" class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Subject</label>
                        <input id="my-input" class="form-control" type="text" name="subject">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="body" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button name="php_mailer_obj" class="btn mt-4 btn-info btn-block" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require './footer.php' ?>