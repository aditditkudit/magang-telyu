<!DOCTYPE html>
<head>
    <title>Validation dengan CodeIgniter</title>
</head>
<body>
    <h1>Form Validation</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('latihan/belajar/aksi'); ?>
        <label>Nama</label> <br/>
        <input type="text" name="nama"> <br/>
        <!-- <?php echo form_error('nama') ?> -->
        <label>Password</label> <br/>
        <input type="password" name="pass"> <br/>
        <!-- <?php echo form_error('pass') ?> -->
        <label>Konfirmasi Password</label> <br/>
        <input type="password" name="konfPass" > <br/>
        <!-- <?php echo form_error('konfPass') ?> -->
        <input type="submit" value="Simpan" >
    </form>
</body>
</html>