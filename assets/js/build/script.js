// Go wild...
import Macy from "macy";

const grids = document.querySelectorAll('.ma-gallery');

grids.forEach( grid => {
  const maGalleryGrid = Macy({
    container: grid,
    trueOrder: true,
    waitForImages: false,
    mobileFirst: true,
    margin: 8,
    columns: 1,
    breakAt: {
      520: {
        margin: 16,
        columns: 2
      },
      1024: {
        margin: 32,
        columns: 3
      },
      1440: {
        columns: 4
      }
    }
  });

  maGalleryGrid.on(maGalleryGrid.constants.EVENT_IMAGE_COMPLETE, function (ctx) {
    // console.log(ctx);
    ctx.instance.container.classList.add('ma-gallery--loaded');
  });
})
