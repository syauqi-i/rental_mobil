<style>
.modern-footer {
  padding: 1rem 1.5rem;
  border-top: 1px solid #e2e8f0;
  background: #ffffff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  font-family: 'Inter', system-ui, sans-serif;
  flex-wrap: wrap;
  gap: .5rem;
  margin-top: auto;
}
.modern-footer span {
  font-size: .75rem;
  color: #94a3b8;
  font-weight: 500;
}
.modern-footer a {
  color: #2563eb;
  text-decoration: none;
  font-weight: 600;
  transition: color .18s;
}
.modern-footer a:hover { color: #1d4ed8; }
</style>

<footer class="modern-footer">
  <span>&copy; <?= date('Y') ?> <?= APP_NAME ?>. All rights reserved.</span>
  <!-- <span>Built with <span style="color:#ef4444">♥</span> by <a href="#">admin</a></span> -->
</footer>