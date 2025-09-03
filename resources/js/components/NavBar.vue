<template>
    <nav class="nav-bar">
        <div class="logo">
            <img src="/public/whitecircleblack.jpg" class="logo" alt="logo"></img>
        </div>
        <div class="">
        <RouterLink class="link-title" to="/"> Blogs </RouterLink>

          </div>
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
       justify-content: space-between;
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
    height: 80%; 
}
.nav-links{
    display: flex;
    gap: 1rem;
}
.link-title {
    color: #71797E;
    text-decoration: none;
}
.link-title:hover {
    color: #F2F0EF;
    
}
</style>