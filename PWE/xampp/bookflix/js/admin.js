document.querySelector('#close-update').onclick = () =>{
    document.querySelector('.edit-product-form').style.display = 'none';
    window.location.href = 'total_books.php';
 }


 setTimeout(() => {
   const box = document.getElementById('messages');
 
   // 👇️ hides element (still takes up space on page)
   box.style.visibility = 'hidden';
 }, 8000);
