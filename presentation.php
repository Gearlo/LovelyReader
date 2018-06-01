<?php
	include("htmlGen.php");
	include("library.php");
	$books = get_Books_Info();


	//Encbezado:
	$header = new htmlLabel();
	$header->name = "header";


	//Libreria:
	$container = new htmlLabel();
	$row = new htmlLabel();

	$container->name = "div";
	$container->atributes["class"] = "container";

	$row->name = "div";
	$row->atributes["class"] = "row";

	$shelf = new htmlLabel();
	$img = new htmlLabel();
	$wrap = new htmlLabel();
	$sin = new htmlLabel();

	$shelf->name = "div";
	$wrap->name = "div";
	$sin->name = "div";
	$img->name = "img";	
	$shelf->atributes["class"] = "col-xs-6 col-md-4 col-lg-3 library_bookShelf";
	$wrap->atributes["class"] = "library_bookWrap h";
	$sin->atributes["class"] = "sinopsis";
	$img->atributes["class"] = "library_book_cover";
	//$shelf->atributes["style"] = "";


	$img->twin = False;

	for($i = 0; $i < count($books) ; $i++){
		$img->atributes["src"] = $books[$i]["cover"];
		$sin->text = $books[$i]["sinopsis"];

		$wrap->text = $img->getHtml() .  $sin->getHtml() . "<a onClick='readBook(\"" . $books[$i]['id'] ."\")'>Leer</a>" . "<h4>" . $books[$i]["name"] . "</h4>" . "<h6>" . $books[$i]["autor"] . "</h6>";
		$shelf->text = $wrap->getHtml();	
		$row->text = $row->text . $shelf->getHtml();
	}

	$container->text = $row->getHtml();

	$modalBack = new htmlLabel();
	$modalFrame = new htmlLabel();
	$modalContent = new htmlLabel();
	$modalContent->name = $modalBack->name = $modalFrame->name = "div";
	$modalBack->atributes["class"] = "modalBack";
	$modalFrame->atributes["class"] = "modalFrame";
	$modalContent->atributes["class"] = "modalContent";
	$modalFrame->text = $modalContent->getHtml();
	$modalBack->text = $modalFrame->getHtml();

	echo $container->getHtml() . $modalBack->getHtml();
?>