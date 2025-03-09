<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# ITI_Larvel_labs

## **🚀 Features Implemented**

✅ Add a new post

✅ Edit an existing post

✅ Delete a post

✅ Display all posts dynamically

✅ Use Blade templates for UI

✅ Style with Tailwind CSS

✅ Use Vite for asset bundling

---

## **📂 Project Structure**

- `routes/web.php` → Defines the routes for handling post-related operations
- `app/Http/Controllers/PostsController.php` → Contains the logic for managing posts
- `resources/views/` → Blade templates for rendering the UI
    - `index.blade.php` → Displays all posts
    - `create.blade.php` → Form to add a new post
    - `show.blade.php` → View details of a post
    - `layout.blade.php` → Main layout for the project

---

## **⚡ How It Works**

### **1️⃣ Viewing Posts**

- The homepage (`index.blade.php`) lists all available posts.
- Each post has an edit and delete option.

### **2️⃣ Creating a Post**

- Clicking the **"Add Post"** button navigates to the `create.blade.php` form.
- The form submits data via a **POST request** to store the post temporarily.

### **3️⃣ Editing a Post**

- Clicking **"Edit"** on a post opens a pre-filled form (`update.blade.php`).
- The form sends a **PUT request** to update the post.

### **4️⃣ Deleting a Post**

- Clicking **"Delete"** removes the post from the view using a **DELETE request**.
- Since there is no database, the post is removed from the temporary storage.

## **🛠️ Setup & Run**

### **1️⃣ Install Dependencies**

```

npm install --legacy-peer-deps
composer install

```

### **2️⃣ Start the Development Server**

```

npm run dev
php artisan serve

```