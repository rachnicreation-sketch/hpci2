<?php require_once('includes/maintenance_check.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>HPCI-SARL — Hygiène Prodige Com International</title>
<link rel="stylesheet" href="style.css">
<!-- Font Awesome 6.x -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
/* ... (Existing styles if any, but I'll replace the hero part) ... */
</style>
<script src="scripts/hero_slider.js" defer></script>
</head>
<body data-root="./">


<section class="hero-slider">
  <div class="hero-slides">
    <!-- SLIDE 1: MAIN -->
    <div class="hero-slide active">
      <div class="slide-content">
        <span class="slide-badge">Expertise & Innovation depuis 2014</span>
        <h1 class="slide-title">L'Excellence du Nettoyage <span>Industriel & Professionnel</span></h1>
        <p class="slide-desc">Leader panafricain de l'hygiène industrielle, HPCI-SARL déploie des solutions de pointe pour la maintenance, l'assainissement et la sécurité de vos installations les plus critiques.</p>
        <div class="slide-cta">
          <a href="pages/services.html" class="btn-slider">Nos solutions techniques <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="slide-visual">
        <img src="./images/hero/hero-principal.png" alt="Nettoyage Industriel">
      </div>
    </div>

    <!-- SLIDE 2: PHYTO -->
    <div class="hero-slide">
      <div class="slide-content">
        <span class="slide-badge">Hygiène Environnementale</span>
        <h1 class="slide-title">Traitement phytosanitaire et <span>assainissement</span></h1>
        <p class="slide-desc">Méthodes spécifiques utilisées pour éliminer les organismes nuisibles et maintenir un environnement sain, tout en préservant la biodiversité.</p>
        <div class="slide-cta">
          <a href="pages/services.html" class="btn-slider">En savoir plus <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="slide-visual">
        <img src="./images/services/phyto.jpg" alt="Traitement Phytosanitaire">
      </div>
    </div>

    <!-- SLIDE 3: HSE -->
    <div class="hero-slide">
      <div class="slide-content">
        <span class="slide-badge">Qualité, Hygiène, Sécurité & Environnement</span>
        <h1 class="slide-title">Mise à disposition du <span>personnel HSE</span></h1>
        <p class="slide-desc">Fourniture de professionnels en santé, sécurité et environnement pour garantir la conformité réglementaire et la gestion des risques.</p>
        <div class="slide-cta">
          <a href="pages/services.html" class="btn-slider">En savoir plus <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="slide-visual">
        <img src="./images/services/HSE.jpg" alt="Personnel HSE">
      </div>
    </div>

    <!-- SLIDE 4: ENGINEERING -->
    <div class="hero-slide">
      <div class="slide-content">
        <span class="slide-badge">Bureau d'études & Engineering</span>
        <h1 class="slide-title">Engineering : <span>Conception & Optimisation</span></h1>
        <p class="slide-desc">L’ingénierie est une discipline qui englobe la conception, la réalisation et l’optimisation de systèmes techniques, industriels ou mécaniques.</p>
        <div class="slide-cta">
          <a href="pages/services.html" class="btn-slider">En savoir plus <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
      <div class="slide-visual">
        <img src="./images/services/maintenance-industrielle.jpg" alt="Engineering HPCI">
      </div>
    </div>
  </div>

  <div class="hero-dots"></div>
</section>

<section class="testimonials-section">
  <div class="container">
    <div class="testimonials-grid">
      <div class="testimonials-visual">
        <div class="testimonials-visual-caption">
          <strong>12+</strong>
          <span>Années d'expertise</span>
        </div>
      </div>
      <div class="testimonials-content">
        <p class="section-eyebrow">Témoignages clients</p>
        <h2 class="section-title">Ce que disent nos clients</h2>
        <div class="testimonials-slider">
          <div class="testimonials-track" id="testimonialTrack">
            <div class="testimonial-slide">
              <p class="testimonials-text">"Impeccable, délais respectés, qualité exceptionnelle. HPCI-SARL a transformé nos installations."</p>
              <div class="testimonial-user">
                <div class="testimonial-avatar" style="background:var(--navy);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:1.1rem;">KM</div>
                <div><h4>Konan Marcel</h4><p>Cadre de banque, Abidjan</p></div>
              </div>
            </div>
            <div class="testimonial-slide">
              <p class="testimonials-text">"Professionnalisme exceptionnel, réponses rapides et satisfaction totale. Une équipe de confiance."</p>
              <div class="testimonial-user">
                <div class="testimonial-avatar" style="background:var(--red);display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:1.1rem;">KD</div>
                <div><h4>Koua Désiré</h4><p>Directeur technique, Pointe-Noire</p></div>
              </div>
            </div>
          </div>
        </div>
        <div class="testimonial-nav">
          <div class="dot active" onclick="gotoSlide(0)"></div>
          <div class="dot" onclick="gotoSlide(1)"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="partners-section">
  <div class="partners-header">
    <p class="partners-label">Ils nous font confiance</p>
  </div>
  <div class="partners-marquee">
    <div class="partners-track">
      <!-- Lot 1 -->
      <a href="https://www.mucodec.com/" target="_blank" class="partner-item"><img src="./images/partenaires/mucodec.png" alt="MUCODEC"></a>
      <a href="http://groupendounafrancois.com/" target="_blank" class="partner-item"><img src="./images/partenaires/groupe-ndouna.png" alt="Groupe Ndouna François"></a>
      <a href="https://www.eni.com/" target="_blank" class="partner-item"><img src="./images/partenaires/eni.png" alt="ENI"></a>
      <a href="http://www.coraf.cg/" target="_blank" class="partner-item"><img src="./images/partenaires/coraf.png" alt="CORAF"></a>
      <a href="http://www.cec-congo.com/" target="_blank" class="partner-item"><img src="./images/partenaires/cec.png" alt="CEC"></a>
      <a href="#" class="partner-item"><img src="./images/partenaires/total-energies.png" alt="TotalEnergies"></a>
      <a href="#" class="partner-item"><img src="./images/partenaires/snpc.png" alt="SNPC"></a>
      <a href="#" class="partner-item"><img src="./images/partenaires/dixtone.png" alt="DIXSTONE"></a>
      <a href="#" class="partner-item"><img src="./images/partenaires/perenco.png" alt="PERENCO"></a>
      <!-- Lot 2 (doublon pour marquee infini) -->
      <a href="https://www.mucodec.com/" target="_blank" class="partner-item"><img src="./images/partenaires/mucodec.png" alt="MUCODEC"></a>
      <a href="http://groupendounafrancois.com/" target="_blank" class="partner-item"><img src="./images/partenaires/groupe-ndouna.png" alt="Groupe Ndouna François"></a>
      <a href="https://www.eni.com/" target="_blank" class="partner-item"><img src="./images/partenaires/eni.png" alt="ENI"></a>
      <a href="http://www.coraf.cg/" target="_blank" class="partner-item"><img src="./images/partenaires/coraf.png" alt="CORAF"></a>
      <a href="http://www.cec-congo.com/" target="_blank" class="partner-item"><img src="./images/partenaires/cec.png" alt="CEC"></a>
      <a href="#" class="partner-item"><img src="./images/partenaires/total-energies.png" alt="TotalEnergies"></a>
      <a href="#" class="partner-item"><img src="./images/partenaires/snpc.png" alt="SNPC"></a>
      <a href="#" class="partner-item"><img src="./images/partenaires/dixtone.png" alt="DIXSTONE"></a>
      <a href="#" class="partner-item"><img src="./images/partenaires/perenco.png" alt="PERENCO"></a>
    </div>
  </div>
</section>
<script src="components.js"></script>
<script>
  injectNav('accueil');
  injectFooter();
</script>

<script>
  function gotoSlide(n) {
    const track = document.getElementById('testimonialTrack');
    const dots = document.querySelectorAll('.dot');
    track.style.transform = `translateX(-${n * 100}%)`;
    dots.forEach((dot, index) => dot.classList.toggle('active', index === n));
  }
</script>
</body>
</html>
