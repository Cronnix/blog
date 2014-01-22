function confirmDel(id){
	if (confirm('Are you sure you want to delete this article?')) {
    	window.location="article.php?function=delete&id=" + id;
	} 
	else {
   		return;
	}
}