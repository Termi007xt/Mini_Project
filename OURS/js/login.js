const config = {
    colors: [
        { color: '#fffddd', enabled: true },
        { color: '#40aa54', enabled: true },
        { color: '#7ed957', enabled: true },
        { color: '#5bbd3b', enabled: true },
        { color: '#836803', enabled: true },
    ],
    speed: 1,
    horizontalPressure: 3,
    verticalPressure: 10,
    waveFrequencyX: 2,
    waveFrequencyY: 4,
    waveAmplitude: 8,
    backgroundColor: '#003FFF',
    grainIntensity: 0.1,
    resolution: 1,
};

// Select the canvas
const canvas = document.getElementById('gradientCanvas');
const ctx = canvas.getContext('2d');

// Resize canvas to fill the screen
function resizeCanvas() {
    canvas.width = window.innerWidth * config.resolution;
    canvas.height = window.innerHeight * config.resolution;
}
window.addEventListener('resize', resizeCanvas);
resizeCanvas();

// Gradient generator
function generateGradient() {
    const { colors, backgroundColor, waveFrequencyX, waveFrequencyY, waveAmplitude, grainIntensity } = config;

    // Fill background
    ctx.fillStyle = backgroundColor;
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Add gradients
    const gradient = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
    let colorStops = colors.filter(c => c.enabled);

    colorStops.forEach((color, i) => {
        gradient.addColorStop(i / (colorStops.length - 1), color.color);
    });

    ctx.globalAlpha = 0.7; // Blending for smoother effect
    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Add grain (if needed)
    if (grainIntensity > 0) addGrain(grainIntensity);
}

// Grain effect
function addGrain(intensity) {
    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    const pixels = imageData.data;
    for (let i = 0; i < pixels.length; i += 4) {
        const grain = (Math.random() - 0.5) * intensity * 255;
        pixels[i] += grain; // Red
        pixels[i + 1] += grain; // Green
        pixels[i + 2] += grain; // Blue
    }
    ctx.putImageData(imageData, 0, 0);
}

// Animation loop
function animate() {
    generateGradient();
    requestAnimationFrame(animate);
}
animate();
