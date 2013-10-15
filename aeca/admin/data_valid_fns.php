<?

function filled_out($form_vars)
{
  // comprueba que cada variable tiene un valor
  foreach ($form_vars as $key => $value)
  {
     if (!isset($key) || ($value == ""))
        return false;
  }
  return true;
}

function valid_email($address)
{
  // comprueba que la direcci�n email sea posiblemente v�lida
  if (ereg("^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $address))
    return true;
  else
    return false;
}

?>