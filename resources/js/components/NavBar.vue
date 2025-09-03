<template>
    <nav class="nav-bar">
        <div class="logo">
            <img src="/public/whitecircleblack.jpg" class="logo" alt="logo"></img>
        </div>
        <div class="nav-links">
        <RouterLink class="link-title" to="/"> Blogs </RouterLink>
        <RouterLink class="link-title" to="/about"> About </RouterLink>
        <RouterLink class="link-title" to="/projects"> Projects </RouterLink>
        <a href="https://github.com/MattJ03" class="link-title">
            <img src="/public/git.png" class="nav-bar-logo-git" />
        </a>
        <a href="https://uk.linkedin.com/in/matt-shaw-564924324" class="link-title" >
            <img src="/public/linkedn.png" class="nav-bar-logo-linkedn" />
        </a>

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
       height: 90px;
}
.nav-container {
    margin: 1rem auto;
    border-radius: 12px;
    background-color: #222428;
    border: 1px solid;
}
.logo {
    border-radius: 50%;
    height: 70px; 
    width: auto;
}
.nav-links{
    display: flex;
    gap: 5rem;
    display: flex;
    justify-content: center;
    align-items: center;
}
.link-title {
    color: #71797E;
    text-decoration: none;
}
.link-title:hover {
    color: #F2F0EF;
    
}
.nav-bar-logo-git {
     height: 40px;
    width: auto;
    border-radius: 10%;
    background: none;
}
.nav-bar-logo-git:hover {
    background: #F2F0EF;
}
.nav-bar-logo-linkedn {
    height: 40px;
    width: auto;
    border-radius: 10%;
    background: none;
}

.nav-bar-logo-linkedn:hover {
    background: #F2F0EF;
    opacity: 0.6;
}
</style>