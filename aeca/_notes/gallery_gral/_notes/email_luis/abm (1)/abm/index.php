
    <?php header( 'Content-type: text/html; charset=utf-8' ); 

include_once ("clase.php");// incluyo las clases a ser usadas
$action='index';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view= new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template


switch ($action)
{
    case 'index':
        $view->photos=Photo::getPhotos(); // tree todos los photos
        $view->contentTemplate="templates/clientesGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->photos=Photo::getPhotos();
        $view->contentTemplate="templates/clientesGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'savePhot':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $id=intval($_POST['id']);
        $title=cleanString($_POST['title']);
        $location=cleanString($_POST['location']);
        $description=cleanString($_POST['description']);
        $publicar=cleanString($_POST['publicar']);
        $photo=new Photo($id);
        $photo->setTitulo($title);
        $photo->setLocaliz($location);
        $photo->setDescrip($description);
        $photo->setPublic($publicar);
        $photo->save();
        break;
    case 'newPhot':
        $view->phot=new Photo();
        $view->label='Nueva Foto';
        $view->disableLayout=true;
        $view->contentTemplate="templates/clientForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editPhot':
        $editId=intval($_POST['id']);
        $view->label='Editar Foto';
        $view->phot=new Photo($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/clientForm.php"; // seteo el template que se va a mostrar
        break;
    case 'deletePhot':
        $id=intval($_POST['id']);
        $phot=new Photo($id);
        $phot->delete();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
