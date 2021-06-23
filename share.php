<button id="sb" class="share-btn"></button>

<script type="text/javascript">
if(window.innerWidth>768){
const shareBtn = document.querySelector('.share-btn');
shareBtn.addEventListener('click', () => {
  if (navigator.share) {
    navigator.share({
      title: document.title,
      url: window.location.href
    });
  }
});}
</script>