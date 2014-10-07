<!DOCTYPE html>
<html>
  <head>
    <title>Calculator</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/global.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="main">

      <h1>3pc Taschenrechner</h1>

      <form action="calculator.php" method="post">

        <table class="calculator">
          <tr>
            <td colspan="5">
              <input class="form-control" type="text" name="anzeige" value="<?= $_GET['display'] ?>" />
            </td>
          </tr>
          <tr>
            <td><input class="btn btn-sm btn-primary" type="submit" value="1" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="2" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="3" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="+" name="button" /></td>
            <td><button class="btn btn-sm btn-primary" type="button" name="button" value="square">x<sup>2</sup></button></td>
          </tr>
          <tr>
            <td><input class="btn btn-sm btn-primary" type="submit" value="4" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="5" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="6" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="-" name="button" /></td>
            <td><button class="btn btn-sm btn-primary" type="button" name="button" value="power">x<sup>y</sup></button></td>
          </tr>
          <tr>
            <td><input class="btn btn-sm btn-primary" type="submit" value="7" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="8" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="9" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="*" name="button" /></td>
            <td><button class="btn btn-sm btn-primary" type="button" name="button" value="faculty">x!</button></td>
          </tr>
          <tr>
            <td><button class="btn btn-sm btn-primary" type="button" name="button" value="plusminus">&plusmn;</button></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="0" name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="button" value="," name="button" /></td>
            <td><input class="btn btn-sm btn-primary" type="submit" value="/" name="button" /></td>
            <td><button class="btn btn-sm btn-primary" type="button" value="sqrt" name="button" />&radic;<span style="text-decoration:overline;">&nbsp;x</span></td>
          </tr>
          <tr>
            <td><input class="btn btn-sm btn-danger" type="submit" value="C" name="button" /></td>          
            <td><button class="btn btn-sm btn-warning" type="button" name="button" value="load">LOAD</button></td>
            <td><button class="btn btn-sm btn-warning" type="button" name="button" value="save">SAVE</button></td>
            <td><button class="btn btn-sm btn-primary" type="button" value="pi" name="button" />&pi;</td>
            <td><input class="btn btn-sm btn-success" type="submit" value="=" name="button" /></td>
          </tr>
        </table>

      </form>

    </div>
  </body>
</html>
