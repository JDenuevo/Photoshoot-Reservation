<style>
  .star-rating {
  cursor: pointer; /* Indicate clickable stars */
}

.star-icon {
  font-size: 20px; /* Adjust star size */
  color: #ddd; /* Default grayish color */
  transition: color 0.2s ease-in-out; /* Smooth color transition */
}

.star-rating > .star-icon.active {
  color: #ffd700; /* Glowing gold color for active stars */
}

</style>

<script>
 const stars = document.querySelectorAll('.star-icon');

stars.forEach(star => {
  star.addEventListener('click', () => {
    const rating = star.dataset.rating;
    stars.forEach(icon => icon.classList.remove('active'));
    for (let i = 0; i < rating; i++) {
      stars[i].classList.add('active');
    }
  });
});

// Add click event listener to document body
document.body.addEventListener('click', event => {
  const starRatingSection = document.querySelector('.star-rating');
  const isClickedInside = starRatingSection.contains(event.target);

  if (!isClickedInside) {
    stars.forEach(icon => icon.classList.remove('active'));
  }
});

</script>

<div class="text-center">
  <img src="../assets/images/undraw_camera.png" class="img-fluid w-25">
  <h5 class="fw-bold my-3">Share your Story: Rate your Experience!</h5>

  <div class="star-rating justify-content-center d-flex">

    <svg class="star-icon mx-2" width="40" height="40" data-rating="1" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-star">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
    </svg>

    <svg class="star-icon mx-2" width="40" height="40" data-rating="2" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-star">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
    </svg>

    <svg class="star-icon mx-2" width="40" height="40" data-rating="3" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-star">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
    </svg>

    <svg class="star-icon mx-2" width="40" height="40" data-rating="4" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-star">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
    </svg>

    <svg class="star-icon mx-2" width="40" height="40" data-rating="5" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-star">
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" />
    </svg>

  </div>

  <div class="form-floating my-3">
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
    <label for="floatingTextarea">Comment..</label>
  </div>

  <button class="btn btn-primary btn-lg rounded-pill fw-semibold mt-5 w-50" type="submit">Rate</button>

</div>

