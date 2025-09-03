<template>
    <nav class="nav-bar">
        <div class="logo">
            <img src="/public/whitecircleblack.jpg" class="logo" alt="logo"></img>
        </div>
        <RouterLink to="/"> Blogs </RouterLink>

    </nav>

    </template>
    <script setup>
</script>
<style scoped>
.nav-bar {
       background-color: #222428;
       padding: 2px;
       display: flex;
       flex-direction: row;
       justify-content: center;
       align-items: center;
       gap: 1rem;
       height: 100px;
}
.nav-container {
    margin: 1rem auto;
    border-radius: 12px;
    background-color: #222428;
    border: 1px solid;
}
.logo {
    margin: 1rem;
    border-radius: 50%;
    height: 90%;
    float: left;

}
</style>