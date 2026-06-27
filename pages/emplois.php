<?php
require_once('../includes/maintenance_check.php');
require_once('../includes/db.php');

$stmt = $pdo->query("SELECT * FROM jobs WHERE is_active = 1 ORDER BY created_at DESC");
$jobs_list = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recrutement - HPCI-SARL</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="../style.css">
  <style>
    .jobs-layout { max-width: 900px; margin: 0 auto; padding-top: 48px; }
    .job-card {
      background: var(--white);
      padding: 40px;
      border-radius: 2px;
      border: 1px solid var(--border);
      margin-bottom: 32px;
      transition: all 0.3s;
      box-shadow: 0 4px 20px rgba(0,0,0,0.04);
    }
    .job-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 40px rgba(10,22,40,0.08);
      border-color: var(--red);
    }
    .job-card h3 {
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 1.6rem;
      color: var(--navy);
      margin-bottom: 16px;
    }
    .job-info {
      display: flex;
      gap: 24px;
      margin-bottom: 24px;
      color: var(--muted);
      font-size: 0.88rem;
      font-weight: 500;
    }
    .job-info span { display: flex; align-items: center; gap: 8px; }
    .job-info i { color: var(--red); }
    .job-desc {
      font-size: 0.95rem;
      color: var(--text);
      line-height: 1.7;
      margin-bottom: 32px;
    }
    .btn-apply {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: var(--red);
      color: var(--white);
      border: none;
      padding: 14px 28px;
      border-radius: 2px;
      font-family: 'Outfit', sans-serif;
      font-weight: 600;
      text-decoration: none;
      font-size: 0.88rem;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      transition: all 0.2s;
    }
    .btn-apply:hover {
      background: var(--red-dark);
      box-shadow: 0 6px 20px rgba(227,6,19,0.25);
    }
  </style>
</head>
<body data-root="../">

  <section class="page-hero">
    <div class="page-hero-bg"></div>
    <div class="page-hero-inner">
      <div class="breadcrumb"><a href="../index.php">Accueil</a><span>></span><span>Recrutement</span></div>
      <h1>Rejoignez HPCI-SARL</h1>
      <p>Nous recherchons des talents motivés pour accompagner notre croissance technique en Afrique centrale et de l'Ouest.</p>
    </div>
    <div class="page-hero-accent"></div>
  </section>

  <section style="background: var(--off-white); padding: 80px 0 100px;">
    <div class="container">
      <div class="jobs-layout">
        <?php foreach ($jobs_list as $job): ?>
          <div class="job-card anim">
            <h3><?php echo htmlspecialchars($job['job_title']); ?></h3>
            <div class="job-info">
              <span><i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars($job['location']); ?></span>
              <span><i class="fa-regular fa-calendar-days"></i> Date limite : <?php echo date('d/m/Y', strtotime($job['deadline'])); ?></span>
            </div>
            <div class="job-desc"><?php echo nl2br(htmlspecialchars($job['description'])); ?></div>
            <a href="mailto:info@hpci-sarl.net?subject=Candidature : <?php echo urlencode($job['job_title']); ?>" class="btn-apply">Postuler par Email <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        <?php endforeach; ?>
        <?php if (empty($jobs_list)): ?>
          <div style="background: var(--white); border: 1px solid var(--border); padding: 80px 40px; text-align: center; border-radius: 2px;">
            <p style="color: var(--muted); font-size: 1.1rem; margin-bottom: 24px;">Aucune offre d'emploi n'est disponible pour le moment.</p>
            <p style="color: var(--muted); font-size: 0.95rem;">Vous pouvez toutefois envoyer une candidature spontanée à <a href="mailto:info@hpci-sarl.net" style="color: var(--red); font-weight: 600; text-decoration: none;">info@hpci-sarl.net</a></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <script src="../components.js"></script>
  <script>
    injectNav('emplois'); 
    injectFooter();
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => { if (entry.isIntersecting) entry.target.classList.add('visible'); });
    }, { threshold: 0.1 });
    document.querySelectorAll('.anim').forEach(el => observer.observe(el));
  </script>
</body>
</html>
