    <template>
      <div class="blog-container">
        <h1 class="title"> {{ blog.title }} </h1>
        <hr class="break-tag"></hr>
        <p class="category"> {{  blog.category }} </p>

        </div>
    </template>
    <script setup>
    import { ref, reactive } from 'vue';
    
    const props = defineProps({
        blog: {
            type: Object,
            required: true,
        }
    });
   
    console.log('blog prop: ', props.blog);

    console.log('blog template');
</script>
<style scoped>
.blog-container {
    border: 2px;
    display: flex;
    flex-direction: column;
    border-radius:16px;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color: #222428;
    margin: 20px auto;
    width: 50%;
}
.title {
      color: #f2f2f2;
    font-size: 18px;
}
.break-tag {
    color: #f2f2f2;
    width: 100%;
}
.category {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>