// <!-- Below javascript code will perform a edit (this logic for a edit a note) -->
edits = document.getElementsByClassName('edit');
Array.from(edits).forEach((element)=>{
  element.addEventListener("click", (e)=>{
    console.log("edit", );
    tr = e.target.parentNode.parentNode;
    title = tr.getElementsByTagName("td")[0].innerText;
    description = tr.getElementsByTagName("td")[1].innerText;
    console.log(title, description);
    title.value = title;
    description.value = description;
    snoEdit.value = e.target.id;
    console.log(e.target.id);
    $('#editModal').modal('toggle');
  })
})

// <!-- Below javascript code will performa Delete (this logic for a delete a note from a table) -->
deletes = document.getElementsByClassName('delete');
Array.from(deletes).forEach((element)=>{
element.addEventListener("click", (e)=>{
console.log("edit", );
sno = e.target.id.substr(1,);
    
if(confirm("Are you sure you want to delete this note?")){
    console.log("Yes");
    window.location = `index.php?delete=${sno}`;
}
else{
    console.log("no");
}
})
})
    