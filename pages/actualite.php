<?php
require_once('../includes/maintenance_check.php');
require_once('../includes/db.php');

$stmt = $pdo->query("SELECT * FROM news ORDER BY published_at DESC");
$news_list = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualités - HPCI-SARL</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="../style.css">
  <style>
    .actus-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 48px; }
    .actu-card { background: var(--white); border-radius: 2px; overflow: hidden; border: 1px solid var(--border); transition: all .4s cubic-bezier(0.165, 0.84, 0.44, 1); display: flex; flex-direction: column; }
    .actu-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(10,22,40,.08); border-color: var(--blue-light); }
    .actu-thumb {
      width: 100%; height: 200px; 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      transition: transform .6s;
    }
    .actu-card:hover .actu-thumb { transform: scale(1.05); }
    .actu-body { padding: 24px; flex-grow: 1; display: flex; flex-direction: column; }
    .actu-tag { display: inline-block; background: rgba(232, 160, 32, .1); color: var(--accent-dark); font-size: 0.7rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; padding: 4px 12px; border-radius: 4px; margin-bottom: 16px; border: 1px solid rgba(232, 160, 32, .2); width: fit-content; }
    .actu-body h3 { font-family: 'Outfit', sans-serif; font-weight: 700; font-size: 1.25rem; color: var(--navy); margin-bottom: 12px; line-height: 1.2; }
    .actu-body p { font-size: 0.88rem; color: var(--muted); line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }
    .actu-footer { display: flex; align-items: center; justify-content: space-between; font-size: 0.75rem; color: #64748b; border-top: 1px solid #f1f5f9; padding-top: 16px; }
    .actu-footer a { color: var(--navy); font-weight: 700; text-decoration: none; font-size: 0.8rem; letter-spacing: .05em; text-transform: uppercase; }
    .actu-footer a:hover { color: var(--red); }
    @media(max-width:1024px){ .actus-grid{grid-template-columns: repeat(2, 1fr);} }
    @media(max-width:640px){ .actus-grid{grid-template-columns: 1fr;} }
  </style>
</head>
<body data-root="../">

  <section class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-inner">
      <div class="breadcrumb"><a href="../index.php">Accueil</a><span>></span><span>Actualités</span></div>
      <h1>Notre Actualité</h1>
      <p>Décryptage des enjeux de l'hygiène industrielle et suivi de nos dernières interventions.</p>
    </div>
    <div class="page-hero-accent"></div>
  </section>

  <section style="background: var(--white); padding: 80px 0 100px;">
    <div class="container">
      <div class="actus-grid">
        <?php foreach ($news_list as $news): ?>
          <div class="actu-card anim">
            <div class="actu-thumb" style="background-image: url('../<?php echo htmlspecialchars($news['image_url']); ?>');">
              <?php if (!$news['image_url']): ?>
                <div style="height: 100%; display: flex; align-items: center; justify-content: center; background: #f1f5f9; color: #94a3b8; font-size: 3rem;">
                  <i class="fa-regular fa-image"></i>
                </div>
              <?php endif; ?>
            </div>
            <div class="actu-body">
              <span class="actu-tag"><?php echo htmlspecialchars($news['category'] ?: 'Actualité'); ?></span>
              <h3><?php echo htmlspecialchars($news['title']); ?></h3>
              <p><?php echo mb_strimwidth(strip_tags($news['content']), 0, 150, "..."); ?></p>
              <div class="actu-footer">
                <span><i class="fa-regular fa-calendar" style="margin-right: 6px;"></i><?php echo date('d/m/Y', strtotime($news['published_at'])); ?></span>
                <!-- Since details page is static, let it go to actu-nettoyage-industriel as fallback or dynamic if implemented -->
                <a href="<?php echo strpos(strtolower($news['title']), 'maintenance') !== false ? 'actu-maintenance.html' : (strpos(strtolower($news['title']), 'professionnel') !== false ? 'actu-nettoyage-pro.html' : 'actu-nettoyage-industriel.html'); ?>">Lire la suite</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <?php if (empty($news_list)): ?>
          <p style="grid-column: 1/-1; text-align: center; color: #94a3b8; padding: 100px 0;">Aucune actualité n'a été publiée pour le moment.</p>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <script src="../components.js"></script>
  <script>
    injectNav('actualite'); 
    injectFooter();
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('visible'); });
    }, { threshold: 0.1 });
    document.querySelectorAll('.anim').forEach(el => observer.observe(el));
  </script>
</body>
</html>
